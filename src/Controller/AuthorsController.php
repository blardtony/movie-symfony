<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Authors;

class AuthorsController extends AbstractController
{
    /**
     * @Route("/authors/{id}", name="authors")
     */
    public function show($id)
    {
      $author = $this->getDoctrine()->getRepository(Authors::class)->find($id);
      if (!$author) {
        return $this->redirectToRoute('movies_list');
      }
      return $this->render('authors/index.html.twig', [
          'author' => $author,
      ]);
    }
}
