<?php

namespace App\Form;

use App\Entity\Area;
use App\Entity\City;
use App\Entity\Department;
use App\Entity\Poi;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\OptionsResolver\OptionsResolver;

class HomeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add(
                'area',
                EntityType::class,
                [
                'class' => Area::class,
                'choice_label' => 'areaName',
                'placeholder' => 'Sélectionnez une région',
                // The field is not mapped in the entity
                'mapped' => false,
                // Not necessary
                'required' => false
                 ]
            );

        /**
         * Listen to events from the field area AFTER submit
         */
        $builder->get('area')->addEventListener(
            // EventName to listen. POST_SUBMIT event can be used to fetch data after denormalization
            FormEvents::POST_SUBMIT,
            // Callback function : function to execute when the event happens
                function (FormEvent $event) {
                    // Get and Save form
                    $form = $event->getForm();
                    $this->addDepartmentField($form->getParent(), $form->getData());
                    // dump($form, $event->getForm()->getParent());
                    // $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
                    //     'department',
                    //     EntityType::class,
                    //     null,
                    //     [
                    //         'class' => Department::class,
                    //         'choice_label' => 'departmentName',
                    //         'placeholder' => 'Sélectionnez un département',
                    //         // The field is not mapped in the entity
                    //         'mapped' => false,
                    //         // Not necessary
                    //         'required' => false, 
                    //         'auto_initialize' => false,
                    //         'choices' => $form->getData()->getDepartments()
                    //     ]
                    // );

                    // $builder->addEventListener(
                    //     FormEvents::POST_SUBMIT,
                    //     function (FormEvent $event) {
                    //         // Get and Save form
                    //         $form = $event->getForm();
                    //         // dump($form, $event->getForm()->getParent());
                    //     }
                    // );
                    // $form->getParent()->add($builder->getForm());

                }
            );
    
            /**
             * Listen to events froms the fields BEFORE submit
             */
            $builder->addEventListener(
                FormEvents::POST_SET_DATA,
                function (FormEvent $event) {
                  $data = $event->getData();
                  /* @var $ville Ville */
                  $city = $data->getCity();
                  $form = $event->getForm();
                  if ($city) {
                    // Get department and area
                    $department = $city->getDepartment();
                    $area = $department->getArea();
                    // Creat the added 2 fields
                    $this->addDepartmentField($form, $area);
                    $this->addCityField($form, $department);
                    // Set the data
                    $form->get('region')->setData($area);
                    $form->get('departement')->setData($department);
                  } else {
                    // Create the 2 fields empty (fields used with JavaScript)
                    $this->addDepartmentField($form, null);
                    $this->addCityField($form, null);
                  }
                }
            );
              
    }

    /**
     * Add the field department to the form
     *
     * @param FormInterface $form
     * @param Area $area
     * @return void
     */
    private function addDepartmentField(\Symfony\Component\Form\FormInterface $form, ?Area $area)
    {
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
            'department',
            EntityType::class,
            null,
            [
                'class' => Department::class,
                'choice_label' => 'departmentName',
                // If the area is defined, the placeholder will be 'Sélectionnez un département', if not 'Sélectionnez d\'abord une région'
                'placeholder' => $area ? 'Sélectionnez un département' : 'Sélectionnez d\'abord la région',
                'mapped' => false, // False because the field is not mapped in the entity
                'required' => false, // False because not necessary
                'auto_initialize' => false,
                // If the area is defined, the choices will be area's department, if not defined it will be an empty array
                'choices' => $area ? $area->getDepartments() : []
            ]
        );

        $builder->addEventListener(
            FormEvents::POST_SUBMIT,
            function (FormEvent $event) {
                // Get and Save form
                $form = $event->getForm();
                // $this->addCityField($form->getParent(), $form->getData());

            }
        );
        $form->add($builder->getForm());
    }

    /**
     * Add the field city to the form
     *
     * @param FormInterface $form
     * @param Department $department
     * @return void
     */
    private function addCityField(\Symfony\Component\Form\FormInterface $form, ?Department $department){
        $builder = $form->getConfig()->getFormFactory()->createNamedBuilder(
        'city', 
        EntityType::class,
        null,[
            'class' => Department::class,
            'choice_label' => 'cityName',
            // If the department is defined, the placeholder will be 'Sélectionnez une ville', if not 'Sélectionnez d\'abord une région'
            'placeholder' => $department ? 'Sélectionnez une ville' : 'Sélectionnez d\'abord une région',
            // If the department is defined, the choices will be department's cities, if not defined it will be an empty array
            'choices' => $department ? $department->getCities() : []

            ]);
    }
   
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Poi::class,
        ]);
    }
}
