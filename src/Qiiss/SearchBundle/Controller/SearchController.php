<?php

namespace Qiiss\SearchBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Qiiss\SearchBundle\Entity\Search;
use Qiiss\SearchBundle\Form\SearchType;
use Symfony\Component\HttpFoundation\Response;
use Qiiss\UserBundle\Entity\User;
use Doctrine\ORM\Query\ResultSetMapping;
use Doctrine\ORM\Query\ResultSetMappingBuilder;

class SearchController extends Controller
{
	/*
	* This function manages the search engine requests.
	*/
    public function indexAction()
		{
			return $this->render('QiissSearchBundle:Search:search.html.twig',
														array('navSelection' => 'searchPeople'));
    }

    public function searchAction() {
    	$page_size = 4;

	    $request = $this->get('request');
		$gender = $request->request->get('gender');
		$age_min = $request->request->get('age_min');
		$age_max = $request->request->get('age_max');
		$location_city = $request->request->get('city');
		$location_country = $request->request->get('country');
		$page = $request->request->get('page');

		$interests_array = json_decode($request->request->get('interests')); // First, convert our jsonified interests into an array
		$num_interests = 0; // We need to build different queries depending on how many interests are being searched for
		asort($interests_array); // Sort our interests array alphabetically
		foreach ($interests_array as $key => $interest) {
			if ($interest != "") {
				$num_interests ++;
			}
			else {
				unset($interests_array[$key]);
			}
		}
		$i = 0;
		foreach ($interests_array as $key => $interest) { // Fix up our array keys, arrays aren't true arrays in PHP but simply sorted maps
			unset($interests_array[$key]);
			$interests_array[$i] = $interest;
			$i++;
		}

		$sql = "SELECT * FROM ("; // We need to use a pure sql statement because we're using "UNION" which is MySQL exclusive
		$stmts = array();
		$params = array();
		if ($num_interests == 3) {
			$stmts[sizeof($stmts)] = "SELECT fos_user.id as userid, username, age, sex, city, intereststring, location_id, location.id as locationid, mediumPath, mediumWidth, mediumHeight FROM fos_user LEFT JOIN location ON (fos_user.location_id = location.id) LEFT JOIN photo ON (fos_user.displayPicture_id = photo.id) WHERE interestString = ?";
			$params[sizeof($params)] = $interests_array[0] . $interests_array[1] . $interests_array[2];
		}
		if ($num_interests > 1) {
			$index = sizeof($stmts);
			$stmts[$index] = "SELECT fos_user.id as userid, username, age, sex, city, intereststring, location_id, location.id as locationid, mediumPath, mediumWidth, mediumHeight FROM fos_user LEFT JOIN location ON (fos_user.location_id = location.id) LEFT JOIN photo ON (fos_user.displayPicture_id = photo.id) WHERE (interestString LIKE ? AND interestString LIKE ?)"; // We know that there are at least two here
			$params[sizeof($params)] = "%" . $interests_array[0] . "%";
			$params[sizeof($params)] = "%" . $interests_array[1] . "%";
			if ($num_interests == 3) {
				$stmts[$index] .= " OR (interestString LIKE ? AND interestString LIKE ?)";
				$params[sizeof($params)] = "%" . $interests_array[0] . $interests_array[2] . "%";
				$stmts[$index] .= " OR (interestString LIKE ? AND interestString LIKE ?)";
				$params[sizeof($params)] = "%" . $interests_array[1] . $interests_array[2] . "%";
			}
		}
		if ($num_interests > 0) {
			$index = sizeof($stmts);
			$stmts[$index] = "SELECT fos_user.id as userid, username, age, sex, city, intereststring, location_id, location.id as locationid, mediumPath, mediumWidth, mediumHeight FROM fos_user LEFT JOIN location ON (fos_user.location_id = location.id) LEFT JOIN photo ON (fos_user.displayPicture_id = photo.id) WHERE (interestString LIKE ?)";
			$params[sizeof($params)] = "%" . $interests_array[0] . "%";
			if ($num_interests == 2) {
				$stmts[$index] .= " OR (interestString LIKE ?)";
	        	$params[sizeof($params)] = "%" . $interests_array[1] . "%";
			}
			if ($num_interests == 3) {
				$stmts[$index] .= " OR (interestString LIKE ?)";
				$params[sizeof($params)] = "%" . $interests_array[2] . "%";
			}
		}
		else {
			$sql .= "SELECT fos_user.id as userid, username, age, sex, city, intereststring, location_id, location.id as locationid, mediumPath, mediumWidth, mediumHeight FROM fos_user LEFT JOIN location ON (fos_user.location_id = location.id) LEFT JOIN photo ON (fos_user.displayPicture_id = photo.id)";
		}
		for ($i = 0; $i < sizeof($stmts); $i++) {
			if ($i < sizeof($stmts) - 1) {
				$sql .= $stmts[$i] . " UNION ";
			}
			else {
				$sql .= $stmts[$i];
			}
		}
		$sql .= ") as u1 ";

		$where = false;
		if ($gender != null) {
			if ($where) {
				$sql .= "AND ";
			}
			else {
				$sql .= "WHERE ";
				$where = true;
			}
			$sql .= " (u1.sex = ?) ";
			$params[sizeof($params)] = $gender;
		}
		if ($age_min != null) {
			if ($where) {
				$sql .= "AND ";
			}
			else {
				$sql .= "WHERE ";
				$where = true;
			}
			$sql .= " (u1.age >= ?) ";
			$params[sizeof($params)] = intval($age_min);
		}
		if ($age_max != null) {
			if ($where) {
				$sql .= "AND ";
			}
			else {
				$sql .= "WHERE ";
				$where = true;
			}
			$sql .= "(u1.age <= ?)";
			$params[sizeof($params)] = intval($age_max);
		}
		if (isset($location_city)) {

		}
		if (isset($location_country)) {

		}

		$sql .= "LIMIT " . $page_size;
		if ($page != null) {
			$sql .= " OFFSET ?";
			$params[sizeof($params)] = (intval($page) * $page_size);
		}

		$sql .= ";";

		$em = $this->getDoctrine()->getEntityManager();

		$rsm = new ResultSetMappingBuilder($em);

		$rsm->addScalarResult('username', 'username');
		$rsm->addScalarResult('city', 'city');
		$rsm->addScalarResult('intereststring', 'intereststring');
		$rsm->addScalarResult('mediumPath', 'mediumPath');
		$rsm->addScalarResult('mediumWidth', 'mediumWidth');
		$rsm->addScalarResult('mediumHeight', 'mediumHeight');
		$rsm->addScalarResult('age', 'age');

        $query = $em->createNativeQuery($sql, $rsm);

        for ($i = 0; $i < sizeof($params); $i++) {
			$query->setParameter($i, $params[$i]);
        }

        $results = $query->getResult();
        $toReturn = array();
        $i = 0;
        foreach ($results as $result) {
        	$toReturn['results'][$i]['username'] = $result['username'];
        	$toReturn['results'][$i]['city'] = $result['city'];
        	$toReturn['results'][$i]['age'] = $result['age'];
        	$toReturn['results'][$i]['interests'] = explode("|", $result['intereststring']);
        	$toReturn['results'][$i]['displayPicture'] = $result['mediumPath'];
        	$toReturn['results'][$i]['displayPictureWidth'] = $result['mediumWidth'];
        	$toReturn['results'][$i]['displayPictureHeight'] = $result['mediumHeight'];
        	$i++;
        }
        return new Response(json_encode($toReturn));
    }
}
