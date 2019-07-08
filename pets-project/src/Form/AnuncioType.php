<?php

namespace App\Form;

use App\Entity\Anuncio;
use App\Entity\Cantones;
use App\Entity\TipoAnuncio;
use App\Entity\CategPet;
use App\Entity\Usuarios;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

class AnuncioType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titulo')
            ->add('Descr')
            ->add('idtipo', EntityType::class, [
   
                    'class' => TipoAnuncio::class,
                    'choice_label' => 'descTipo',])
            ->add('idcateg', EntityType::class, [
   
                    'class' => CategPet::class,
                    'choice_label' => 'descPet',])
            ->add('iduser', EntityType::class, [
   
                    'class' => Usuarios::class,
                    'choice_label' => 'NomUser',])
            ->add('idcanton', EntityType::class, [
   
                    'class' => Cantones::class,
                    'choice_label' => 'nomCanton',])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Anuncio::class,
        ]);
    }
}
