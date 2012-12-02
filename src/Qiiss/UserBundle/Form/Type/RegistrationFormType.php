<?php

namespace Qiiss\UserBundle\Form\Type;

use Symfony\Component\Form\FormBuilderInterface;
use FOS\UserBundle\Form\Type\RegistrationFormType as BaseType;

class RegistrationFormType extends BaseType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', null, array('label' => 'form.username', 'translation_domain' => 'FOSUserBundle', "error_bubbling" => true))
            ->add('email', 'email', array('label' => 'form.email', 'translation_domain' => 'FOSUserBundle', "error_bubbling" => true))
            ->add('plainPassword', 'repeated', array(
                'type' => 'password',
                'options' => array('translation_domain' => 'FOSUserBundle'),
                'first_options' => array('label' => 'form.password'),
                'second_options' => array('label' => 'form.password_confirmation'),
                'required' => true,
                'invalid_message' => 'fos_user.password.badmatch',
                'error_bubbling' => true))
            ->add('dob', 'date',
                array('input' => 'string',
                    'format' => 'dd-MM-yyyy',
                    'years' => range(1945,2013),
                    'invalid_message' => 'dob.invalid',
                    'error_bubbling' => true))
        ;
    }

    public function getName()
    {
        return 'qiiss_user_registration';
    }
}
