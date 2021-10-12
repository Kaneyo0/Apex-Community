<?php

namespace App\Form;

use App\Entity\Saison;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Saison1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numero')
            ->add('date')
            ->add('newCaracter')
            ->add('newMap')
            ->add('newWeapon')
            ->add('nbFix')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Saison::class,
        ]);
    }
}
