<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Movies;
use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

/**
 * @Route("/movies", name="movies_")
 */
class MoviesController extends AbstractController
{
  /**
   * @Route("/", name="list")
   */
  public function index(Request $request, PaginatorInterface $paginator)
  {
    $movie = $this->getDoctrine()->getRepository(Movies::class)->findBy([], ['name' => 'ASC']);
    $movies = $paginator->paginate(
      $movie,
      $request->query->getInt('page',1),
      20
    );
    return $this->render('movies/index.html.twig', [
      'movies' => $movies,
    ]);
  }

  /**
   * @Route("/card/{{id}}", name="card")
   */
  public function show($id)
  {
    $movie = $this->getDoctrine()->getRepository(Movies::class)->find($id);
    return $this->render('movies/card.html.twig', [
      'movie' => $movie,
    ]);
  }
}
