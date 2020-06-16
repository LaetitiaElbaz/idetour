<?php

namespace App\Form;

use App\Entity\Poi;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PoiType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('poiName')
            ->add('description')
            ->add('address')
            ->add('poiGpsLat')
            ->add('poiGpsLng')
            ->add('poiSlug')
            ->add('createdAt')
            ->add('updatedAt')
            ->add('categories')
            ->add('tags')
            ->add('reviews')
            ->add('city')
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Poi::class,
        ]);
    }
}
