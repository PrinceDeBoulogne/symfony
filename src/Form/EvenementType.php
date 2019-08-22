<?php

namespace App\Form;

use App\Entity\Evenement;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EvenementType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('type')
            ->add('dateDebut', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('dateFin', DateType::class, [
                'widget' => 'single_text',
            ])
            ->add('lieu')
            ->add('ville')
            ->add('description')
            ->add('prix')
            ->add('artisteId')
            // ->add('artiste', EntityType::class, [
            //     'class' => Artiste::class,
            //     'query_builder' => function (EntityRepository $er) {
            //       return $er->createQueryBuilder('a')
            //         ->orderBy('a.nom', 'ASC');
            //     },
            //     'choice_label' => 'name'
            //   ])
            ->add('image', FileType::class, [
                'label' => 'Img',
                'data_class' => null
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Evenement::class,
        ]);
    }
}
