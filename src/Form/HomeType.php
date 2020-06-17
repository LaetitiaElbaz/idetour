<?php

namespace App\Form;

use App\Entity\Area;
use App\Entity\Department;
use App\Entity\Poi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('area', EntityType::class, [
                // looks for choices from this entity
                'class' => Area::class,
                'placeholder' => 'Sélectionnez une région',
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
                'mapped' => false, 
                'required' => false
            ])
            ->add('department', EntityType::class, [
                // looks for choices from this entity
                'class' => Department::class,
                'placeholder' => 'Sélectionnez un département',
                // used to render a select box, check boxes or radios
                // 'multiple' => true,
                // 'expanded' => true,
                'mapped' => false, 
                'required' => false
            ])
            ->add('poiName')
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
