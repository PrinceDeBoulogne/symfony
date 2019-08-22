<?php

namespace App\Form;

use App\Entity\Streaming;
use App\Entity\User;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class StreamingType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('titreMorceau')
            ->add('qualite')
            ->add('prix')
            ->add('produitId')
            ->add('userId', EntityType::class, [
                'class' => User::class,
                'query_builder' => function (EntityRepository $er) {
                  return $er->createQueryBuilder('s')
                    ->orderBy('s.nom', 'ASC');
                },
                'choice_label' => 'nom'
              ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Streaming::class,
        ]);
    }
}
