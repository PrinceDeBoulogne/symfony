<?php

namespace App\Form;

use App\Entity\LigneCommande;
use App\Entity\Support;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class LigneCommandeType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('numeroCommande')
            ->add('numeroSupport')
            ->add('commandeId')
            ->add('support', EntityType::class, [
                'class' => Support::class,
                'query_builder' => function (EntityRepository $er) {
                  return $er->createQueryBuilder('lc')
                    ->orderBy('lc.typeSupport', 'ASC');
                },
                'choice_label' => 'typeSupport'
              ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => LigneCommande::class,
        ]);
    }
}
