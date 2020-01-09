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
        ->add('name', TextType::class, [
          'label' => "Nom du film"
        ])
        ->add('description', TextareaType::class, [
          'label' => "Description",
          'required' => false
        ])
        ->add('date', DateType::class, [
          'format' => 'ddMMMMyyy',
          'years' => range(1900, date('Y')),
          'label' => "Date de sortie",
          'required' => false
        ])
        ->add('country', TextType::class, [
          'label' => "Pays d'origine",
          'required' => false
        ])
        ->add('cover', TextType::class, [
          'label' => "Affiche du film",
          'required' => false
        ])
        ->add('link', TextType::class, [
          'label' => "Lien vers allociné",
          'required' => false
        ])
        ->add('author', EntityType::class, [
          'class' => Authors::class,
          'choice_label' => 'name',
          'label' => "Réalisateur",
          'required' => false
        ])
        ->add('Enregistrer', SubmitType::class);
  }
}
