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
  const LIMIT = 20;
  /**
   * @Route("", name="list")
   */
  public function index()
  {
    return $this->render('movies/index.html.twig', [
      'limit' => self::LIMIT,
    ]);
  }

    /**
     * @param Request $request
     * @Route("/ajax", name="ajax")
     * @return Response
     */
  public function ajax(Request $request)
  {
    $search = (string) $request->query->get('search', null);

    $offset = (int) $request->query->get('offset', 0);

    $movies = $this->getDoctrine()
    ->getRepository(Movies::class)
    ->createQueryBuilder('m')
    ->where('m.name LIKE :name')
    ->setParameter('name', '%' . $search .'%')
    ->setMaxResults(self::LIMIT)
    ->setFirstResult($offset)
    ->orderBy('m.name')
    ->getQuery()
    ->execute();

    return $this->render('movies/movie.html.twig', [
      'movies' => $movies,
      'offset' => $offset,
    ]);
  }

    /**
     * @Route("/card/{id}", name="card")
     * @param $id
     * @return Response
     */
  public function show($id)
  {
    $movie = $this->getDoctrine()->getRepository(Movies::class)->find($id);

    if (!$movie) {
      return $this->redirectToRoute('movies_list');
    }
    return $this->render('movies/card.html.twig', [
      'movie' => $movie,
    ]);
  }
}
