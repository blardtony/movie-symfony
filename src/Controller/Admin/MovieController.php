<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movies;

class MovieController extends AbstractController
{
  /**
   * @Route("/movies/add", name="admin_movies_add")
   */
  public function add()
  {
    return $this->render('admin/movies/add.html.twig', [

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
