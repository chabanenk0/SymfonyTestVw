<?php

namespace chab\TestTourBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('category')
            ->add('info')
            ->add('tours')
        ;
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'chab\TestTourBundle\Entity\Category'
        ));
    }

    public function getName()
    {
        return 'chab_testtourbundle_categorytype';
    }
}
