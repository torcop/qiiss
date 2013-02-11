<?php
namespace Qiiss\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Qiiss\UserBundle\Entity\User;
use Qiiss\UserBundle\Entity\Interest;
use Qiiss\SearchBundle\Entity\Preference;

class UserAttributesController extends Controller
{
    public function predictInterestsAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        if($request->isMethod('POST')) {
            $searchTerm = $this->get('request')->request->get('searchTerm');
            if (isset($searchTerm)) {
                $maxResults = 10;
                $em = $this->getDoctrine()->getEntityManager();
                $dql = "SELECT i FROM Qiiss\UserBundle\Entity\Interest i WHERE i.name LIKE :searchTerm ORDER BY i.numUsers DESC";
                $query = $em->createQuery($dql)
                    ->setMaxResults($maxResults)
                    ->setParameter('searchTerm', "%" . $searchTerm . "%");

                $paginator = new Paginator($query, $fetchJoinCollection = false);

                $c = count($paginator);
                $resultArray = array(
                    "result" => "success",
                    "numResults" => 0
                );
                $i = 0;
                foreach ($paginator as $post) {
                    $resultArray["rows"][$i]["value"] = $post->getName();
                    $resultArray["rows"][$i]["numUsers"] = $post->getNumUsers();
                    $resultArray["numResults"]++;
                    $i++;
                }
                return new Response(json_encode($resultArray));
            }
        }
        return new Response(json_encode(array("result" => "failure", "message" => "This method can only be called via POST request.")));
    }

    public function predictPreferenceAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        if($request->isMethod('POST')) {
            $searchTerm = $this->get('request')->request->get('searchTerm');
            if (isset($searchTerm)) {
                $maxResults = 10;
                $em = $this->getDoctrine()->getEntityManager();
                $dql = "SELECT p FROM Qiiss\SearchBundle\Entity\Preference p WHERE p.preference LIKE :searchTerm";
                $query = $em->createQuery($dql)
                    ->setMaxResults($maxResults)
                    ->setParameter('searchTerm', "%" . $searchTerm . "%");

                $paginator = new Paginator($query, $fetchJoinCollection = false);

                $c = count($paginator);
                $resultArray = array(
                    "result" => "success",
                    "numResults" => 0
                );
                $i = 0;
                foreach ($paginator as $post) {
                    $resultArray["rows"][$i]["value"] = $post->getPreference();
                    $resultArray["numResults"]++;
                    $i++;
                }
                return new Response(json_encode($resultArray));
            }
        }
        return new Response(json_encode(array("result" => "failure", "message" => "This method can only be called via POST request.")));
    }

    public function predictLocationAction($type) {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        if($request->isMethod('POST')) {
            $searchTerm = $this->get('request')->request->get('searchTerm');
            if (isset($searchTerm)) {
                $maxResults = 10;
                $em = $this->getDoctrine()->getEntityManager();
                if ($type == "city") {
                    $dql = "SELECT l FROM Qiiss\SearchBundle\Entity\Location l WHERE l.city LIKE :searchTerm ORDER BY l.numUsers DESC";
                }
                else {
                    $dql = "SELECT l FROM Qiiss\SearchBundle\Entity\Location l WHERE l.country LIKE :searchTerm GROUP BY l.country ORDER BY l.numUsers DESC";
                }
                $query = $em->createQuery($dql)
                    ->setMaxResults($maxResults)
                    ->setParameter('searchTerm', "%" . $searchTerm . "%");

                $paginator = new Paginator($query, $fetchJoinCollection = false);

                $c = count($paginator);
                $resultArray = array(
                    "result" => "success",
                    "numResults" => 0
                );
                $i = 0;
                foreach ($paginator as $post) {
                    if ($type == "city") {
                        $resultArray["isSplit"] = true;
                        $resultArray["rows"][$i]["valOne"] = $post->getCity();
                        $resultArray["rows"][$i]["valTwo"] = $post->getCountry();
                    }
                    else {
                        $resultArray["rows"][$i]["value"] = $post->getCountry();
                    }
                    $resultArray["rows"][$i]["numUsers"] = $post->getNumUsers();
                    $resultArray["rows"]++;
                    $i++;
                }
                return new Response(json_encode($resultArray));
            }
        }
        return new Response(json_encode(array("result" => "failure", "message" => "This method can only be called via POST request.")));
    }

    public function setProfileAction() {
        $user = $this->container->get('security.context')->getToken()->getUser();
        $request = $this->get('request');
        if (!is_object($user)) {
            throw new AccessDeniedException('This user does not have access to this section.');
        }

        if($request->getMethod() == 'POST') {
            $interests = $request->request->get('interests');

            if (isset($interests)) {
                $em = $this->getDoctrine()->getEntityManager();
                $repository = $em->getRepository('Qiiss\UserBundle\Entity\Interest');
                $interestsArray = json_decode($interests);
                // Remove all interests that the user has "untagged"
                foreach ($user->getInterests() as $interest) {
                    $user->removeInterest($interest);
                    $interest->setNumUsers($interest->getNumUsers() - 1);
                }
                // Add new interests
                $interestString = '';
                asort($interestsArray); // Sort our array in alphabetical order
                foreach ($interestsArray as $interest) {
                    if ($interest != "" && $interest != "Interest One" && $interest != "Interest Two" && $interest != "Interest Three") {
                        $interestString .= str_replace("|", "", $interest) . "|";
                        $toAdd = $repository->findOneBy(array('name' => $interest));
                        if (isset($toAdd)) {
                            $user->addInterest($toAdd);
                            $toAdd->setNumUsers($toAdd->getNumUsers() + 1);
                        }
                        else {
                            $toAdd = new Interest();
                            $toAdd->setName($interest);
                            $toAdd->setNumUsers(1);
                            $user->addInterest($toAdd);
                            $em->persist($toAdd);
                        }
                    }
                }
                $interestString = rtrim($interestString, "|");
                if ($interestString != '') {
                    $user->setInterestString($interestString);
                }
            }

            $locationCity = $request->request->get('location_city');
            $locationCountry = $request->request->get('location_country');

            if (isset($locationCity) && isset($locationCountry)) {
                $em = $this->getDoctrine()->getEntityManager();
                $repository = $em->getRepository('Qiiss\SearchBundle\Entity\Location');
                // Add new interests
                $toAdd = $repository->findOneBy(array('city' => $locationCity, 'country' => $locationCountry));
                if (isset($toAdd)) {
                    $user->setLocation($toAdd);
                }
                else {
                    $user->setLocation($location);
                    /* TODO - Create new locations
                    $toAdd = new Interest();
                    $toAdd->setName($interest);
                    $toAdd->setNumUsers(1);
                    $user->addInterest($toAdd);
                    $em->persist($toAdd);
                    */
                }
            }

            $preference = $request->request->get('preference');

            if (isset($preference)) {
                $em = $this->getDoctrine()->getEntityManager();
                $repository = $em->getRepository('Qiiss\SearchBundle\Entity\Preference');
                // Add new interests
                $toAdd = $repository->findOneBy(array('preference' => $preference));
                if (isset($toAdd)) {
                    $user->setPreference($toAdd);
                }
                else {
                    $toAdd = new Preference();
                    $toAdd->setPreference($preference);
                    $user->setPreference($toAdd);
                    $em->persist($toAdd);
                }
            }

            $charity = $request->request->get('charity');

            if (isset($charity)) {
                $user->setCharity($charity);
            }
            $em->flush();
            return new Response(json_encode(array('result' => 'success')));
        }
        return new Response(json_encode(array('result' => 'failure')));
    }
}
