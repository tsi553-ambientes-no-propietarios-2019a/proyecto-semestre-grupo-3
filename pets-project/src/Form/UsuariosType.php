<?php

namespace App\Form;

use App\Entity\Usuarios;
use App\Entity\Cantones; 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

class UsuariosType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('NomUser')
            ->add('ApelUser')
            ->add('EmailUser')
            ->add('TelfUser')
            ->add('PassUser')
            ->add('idCanton', EntityType::class, [
   
                    'class' => Cantones::class,
                    'choice_label' => 'nomCanton',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Usuarios::class,
        ]);
    }
}
