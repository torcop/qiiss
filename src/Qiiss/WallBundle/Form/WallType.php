<?php

namespace Qiiss\WallBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class WallType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', 'text')
            ->add('date', 'datetime')
            ->add('comment', 'text')
            ->add('nb_Qiiss', 'integer')
            ->add('media_link', 'text')
            ->add('photo', 'integer')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Qiiss\WallBundle\Entity\Wall'
        ));
    }

    public function getName()
    {
        return 'qiiss_wallbundle_walltype';
    }
}
