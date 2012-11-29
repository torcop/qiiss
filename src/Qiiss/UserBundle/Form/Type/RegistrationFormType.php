<?php

namespace Qiiss\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);

        $builder->add('dob', 'date', array('input' => 'string',
																					 'format' => 'dd-MM-yyyy',
																					 'years' => range(1945,2013)));
    }

    public function getName()
    {
        return 'qiiss_user_registration';
    }
}
