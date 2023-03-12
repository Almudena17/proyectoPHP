<?php

namespace App\Form;

use App\Entity\District;
use App\Entity\Park;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ParkType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', TextType::class, [
                "label" => "Nombre"
            ])
            ->add('description', TextType::class, [
                "label" => "Descripción"
            ])
            ->add('image', TextType::class, [
                "label" => "Imagen"
            ])
            ->add('area', TextType::class, [
                "label" => "Extensión"
            ])
            ->add('age', TextType::class, [
                "label" => "Año de apertura"
            ])
            ->add('districts', EntityType::class, [
                "class" => District::class,
                "choice_label" => "name",
                "multiple" => true,
                "expanded" =>true,
                "label" => "Distrito",
            ])
            ->add("enviar", SubmitType::class);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Park::class,
        ]);
    }
}
