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

class AuthorType extends AbstractType
{

  public function buildForm(FormBuilderInterface $builder, array $options)
  {
    $builder
        ->add('name', TextType::class, [
          'label' => "Nom du réalisateur"
        ])
        ->add('birthday', DateType::class, [
          'format' => 'ddMMMMyyy',
          'years' => range(1900, date('Y')),
          'label' => "Date de naissance",
          'required' => false
        ])
        ->add('nationality', TextType::class, [
          'label' => "Nationalité",
          'required' => false
        ])
        ->add('biography', TextareaType::class, [
          'label' => "Biographie du réalisateur",
          'required' => false
        ])
        ->add('photo', TextType::class, [
          'label' => "Lien de la photo du réalisateur",
          'required' => false
        ])
        ->add('link', TextType::class, [
          'label' => "Lien vers allociné",
          'required' => false
        ])
        ->add('Enregistrer', SubmitType::class);
  }
}
