<?php

namespace App\Form;

use App\Entity\Support;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SupportType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('typeSupport')
            ->add('prix')
            ->add('produitId')
            // ->add('produit', EntityType::class, [
            //     'class' => Produit::class,
            //     'query_builder' => function (EntityRepository $er) {
            //       return $er->createQueryBuilder('a')
            //         ->orderBy('a.name', 'ASC');
            //     },
            //     'choice_label' => 'name'
            //   ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Support::class,
        ]);
    }
}
