<?php

namespace Qiiss\ProfileBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class DateType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('event_description')
            ->add('event_date', 'datetime')
            ->add('event_place')
            ->add('event_media')
            ->add('event_link')
            ->add('event_price');
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Qiiss\ProfileBundle\Entity\Date'
        ));
    }

    public function getName()
    {
        return 'qiiss_profilebundle_datetype';
    }
}
