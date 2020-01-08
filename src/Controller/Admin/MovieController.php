<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;
use App\Form\MovieType;


class MovieController extends AbstractController
{
  /**
   * @Route("/movies/add", name="admin_movies_add")
   */
  public function add()
  {
    $movie = new Movies;

    $form = $this->createForm(MovieType::class, $movie);

    return $this->render('admin/movies/add.html.twig', [
      'form' => $form->createView(),
    ]);
  }

  /**
   * @Route("/movies/delete", name="admin_movies_delete")
   */
  public function delete()
  {
    return $this->render('admin/movies/delete.html.twig', [

    ]);
  }
}
