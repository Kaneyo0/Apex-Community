<?php

namespace App\Form;

use App\Entity\Video;
use App\Entity\Tag;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

class VideoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Titre')
            ->add('Lien')
            ->add('Description')
            ->add('Date')
            ->add('Uploader')
            ->add('Tags', EntityType::class, [
                'class' => Tag::class,
                'multiple' => true,
                'expanded' => true,
                'required' => true,
                'choice_label' => function ($tag) {
                    return $tag->getNom();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Video::class,
        ]);
    }
}
