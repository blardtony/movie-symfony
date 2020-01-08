<?php

namespace App\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;

use App\Entity\Movies;
use App\Entity\Authors;

class MovieType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('name', TextType::class, ['label' => "Nom"])
        ->add('description', TextareaType::class, ['label' => "Description"])
        ->add('date', DateType::class, ['label' => "Date de sortie"])
        ->add('country', TextType::class, ['label' => "Pays"])
        ->add('cover', TextType::class, ['label' => "Affiche du film"])
        ->add('link', TextType::class, ['label' => "Lien vers allociné"])
        ->add('author', EntityType::class, [
          'class' => Authors::class,
          'choice_label' => 'name',
          'label' => "Réalisateur",
        ])
        ->add('Enregistrer', SubmitType::class);
  }
}
