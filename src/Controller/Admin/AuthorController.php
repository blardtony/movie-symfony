<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

use App\Entity\Authors;
use App\Form\AuthorType;


class AuthorController extends AbstractController
{
  /**
   * @Route("/authors/add", name="admin_authors_add")
   */
  public function add(Request $request)
  {
    $author = new Authors;

    $form = $this->createForm(AuthorType::class, $author);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
     $movie = $form->getData();

     $entityManager = $this->getDoctrine()->getManager();
     $entityManager->persist($author);
     $entityManager->flush();
   }


    return $this->render('admin/authors/add.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  /**
   * @Route("/movies/edit", name="admin_movies_edit")
   */
  public function edit()
  {
    return $this->render('admin/movies/delete.html.twig', [

    ]);
  }
}
