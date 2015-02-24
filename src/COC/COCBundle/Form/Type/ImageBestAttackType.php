<?php

namespace COC\COCBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;


class ImageBestAttackType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('gold', 'integer', array('label' => 'player.gold'))
            ->add('elixir', 'integer', array('label' => 'player.elixir'))
            ->add('image', new ImageType())
            ->add('save', 'submit', array('label' => 'label.create'));
    }


    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'COC\COCBundle\Entity\ImageBestAttack',
        ));
    }


    public function getName()
    {
        return 'imagesBestAttack';
    }
}