<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;
/**
 * @Route("/movies", name="movies_")
 */
class MoviesController extends AbstractController
{
  /**
   * @Route("/list", name="list")
   */
  public function index()
  {
    $movies = $this->getDoctrine()->getRepository(Movies::class)->findBy([], ['name' => 'ASC'], 20);
    return $this->render('movies/index.html.twig', [
      'movies' => $movies,
    ]);
  }

  /**
   * @Route("/card/{{id}}", name="card")
   */
  public function show($id)
  {
    $movies = $this->getDoctrine()->getRepository(Movies::class)->find($id);
    return $this->render('movies/card.html.twig', [
      'movie' => $movies,
    ]);
  }
}
