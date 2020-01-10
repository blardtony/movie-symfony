<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Movies;
/**
 * @Route("/movies", name="movies_")
 */
class MoviesController extends AbstractController
{
  /**
   * @Route("", name="list")
   */
  public function index()
  {
    $movies = $this->getDoctrine()->getRepository(Movies::class)->findBy([], ['name' => 'ASC'], 20);
    return $this->render('movies/index.html.twig', [
      'movies' => $movies,
    ]);
  }

    /**
     * @param Request $request
     * @Route("/search", name="search")
     * @return Response
     */
  public function search(Request $request)
  {
    $search = (string) $request->query->get('search', null);

    $movies = $this->getDoctrine()
    ->getRepository(Movies::class)
    ->createQueryBuilder('m')
    ->where('m.name LIKE :name')
    ->setParameter('name', '%' . $search .'%')
    ->orderBy('m.name')
    ->getQuery()
    ->execute();

    return $this->render('movies/index.html.twig', [
      'movies' => $movies,
    ]);
  }

    /**
     * @Route("/card/{{id}}", name="card")
     * @param $id
     * @return Response
     */
  public function show($id)
  {
    $movie = $this->getDoctrine()->getRepository(Movies::class)->find($id);

    return $this->render('movies/card.html.twig', [
      'movie' => $movie,
    ]);
  }
}
