<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use App\Entity\Movies;
use App\Form\MovieType;


class MovieController extends AbstractController
{
  /**
   * @Route("/movies/add", name="admin_movies_add")
   */
  public function add(Request $request)
  {
    $movie = new Movies;

    $form = $this->createForm(MovieType::class, $movie)
    ->add('Save', SubmitType::class, [
      'label' => 'Ajouter un film',
    ]);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
     $movie = $form->getData();

     $entityManager = $this->getDoctrine()->getManager();
     $entityManager->persist($movie);
     $entityManager->flush();
     return $this->redirectToRoute('admin_movies_edit', [
       'id' => $movie->getId(),
     ]);
   }


    return $this->render('admin/movies/add.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  /**
   * @Route("/movies/edit/{{id}}", name="admin_movies_edit")
   */
  public function edit(Request $request, $id)
  {
    $movie = $this->getDoctrine()->getRepository(Movies::class)->find($id);

    $form = $this->createForm(MovieType::class, $movie)
    ->add('Save', SubmitType::class, [
      'label' => 'Editer un film',
    ]);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
     $movie = $form->getData();

     $entityManager = $this->getDoctrine()->getManager();
     $entityManager->persist($movie);
     $entityManager->flush();
     return $this->redirectToRoute('movies_list');
   }


    return $this->render('admin/movies/edit.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
