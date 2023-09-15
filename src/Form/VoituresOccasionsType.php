<?php

namespace App\Form;

use App\Entity\VoituresOccasions;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class VoituresOccasionsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('Prix')
            ->add('Annee_de_mise_en_circulation')
            ->add('Kilometrage')
            ->add('Caracteristiques')
            ->add('Equipments')
            ->add('Options_installees')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => VoituresOccasions::class,
        ]);
    }
}
