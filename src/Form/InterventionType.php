<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Intervention;
use App\Entity\Technicien;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class InterventionType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('client', EntityType::class, [
                'class' => Client::class,
                'choice_label' => 'nom',
            ])
            ->add('technicien', EntityType::class, [
                'class' => Technicien::class,
                'choice_label' => 'nom',
            ])
            ->add('typeintervention', TextType::class, [
                'label' => 'Type d\'intervention'
            ])
            ->add('statut', ChoiceType::class, [
            'choices' => [
            'Planifiée' => 'planifiee',
            'En cours' => 'en_cours',
            'Terminée' => 'terminee',
            'Annulée' => 'annulee',
            ],
            'placeholder' => '-- Choisir un statut --',
            ])
            ->add('dateintervention', DateType::class, [
                'label' => 'Date de l\'intervention'
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Intervention::class,
        ]);
    }
}
