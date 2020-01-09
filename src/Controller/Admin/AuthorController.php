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
   * @Route("/authors/edit/{{id}}", name="admin_authors_edit")
   */
  public function edit(Request $request, $id)
  {
    $author = $this->getDoctrine()->getRepository(Authors::class)->find($id);

    $form = $this->createForm(AuthorType::class, $author);
    $form->handleRequest($request);

    if ($form->isSubmitted() && $form->isValid()) {
     $author = $form->getData();

     $entityManager = $this->getDoctrine()->getManager();
     $entityManager->persist($author);
     $entityManager->flush();
   }


    return $this->render('admin/authors/edit.html.twig', [
      'form' => $form->createView(),
    ]);
  }
}
