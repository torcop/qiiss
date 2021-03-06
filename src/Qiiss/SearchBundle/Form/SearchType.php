<?php

namespace Qiiss\SearchBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Qiiss\SearchBundle\Entity\Location;
use Qiiss\UserBundle\Entity\Interest;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
				$location = new Location;

        $builder
            ->add('preference', 'choice', array('choices' =>
																					array('male' => 'Male', 'female' => 'Female'),
																								'required' => true,))
            ->add('age', 'choice', array('choices' =>
																	array('18' => '18', '25' => '25'),
    																		'required'  => true,))
						->add('location', 'entity', array('class' => 'QiissSearchBundle:Location',
																						'property' => 'city',))
						->add('interests', 'entity', array('class' => 'QiissUserBundle:Interest',
																						'property' => 'name',
																						'multiple' => 'true'));				
            
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Qiiss\SearchBundle\Entity\Search'
        ));
    }

    public function getName()
    {
        return 'qiiss_searchbundle_searchtype';
    }
}
