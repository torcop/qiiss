<?php

namespace Qiiss\CharityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CharityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('weblink')
            ->add('commission')
            ->add('logo')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Qiiss\CharityBundle\Entity\Charity'
        ));
    }

    public function getName()
    {
        return 'qiiss_charitybundle_charitytype';
    }
}
