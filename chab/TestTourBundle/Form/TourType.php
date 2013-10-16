<?php

namespace chab\TestTourBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class TourType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name')
            //->add('city')
            //->add('category')
            ->add('is_public')
            ->add('City_1')
            ->add('categories')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'chab\TestTourBundle\Entity\Tour'
        ));
    }

    public function getName()
    {
        return 'chab_testtourbundle_tourtype';
    }
}
