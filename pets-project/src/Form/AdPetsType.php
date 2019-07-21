<?php

namespace App\Form;

use App\Entity\AdPets;
use App\Entity\CategoryPets;
use App\Entity\TypeAd;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Form\Type\VichImageType;

class AdPetsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('tittle')
            ->add('description')
            ->add('status')
            ->add('typepets',EntityType::class, [
                'class' => TypeAd::class,
                'choice_label' => 'description',
                'placeholder' => 'Seleccione una...'
            ])
            ->add('categorypets', EntityType::class, [
                'class' => CategoryPets::class,
                'choice_label' => 'description',
                'placeholder' => 'Seleccione una...'
            ])
            ->add('imageFile', VichImageType::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AdPets::class,
        ]);
    }
}
