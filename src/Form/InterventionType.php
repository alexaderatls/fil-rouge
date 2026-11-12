<?php

namespace App\Form;

use App\Entity\Client;
use App\Entity\Intervention;
use App\Entity\Technicien;
use Doctrine\DBAL\Types\EnumType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use App\Enum\Status;

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
            ->add('status', EnumType::class, [
                'class' => Status::class,
                'label' => "Statut *",
                'choice_label' => fn(Status $status) => $status->label(), #On affiche la traduction de la value de l'enum
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
