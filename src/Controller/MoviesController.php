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
   * @Route("/", name="list")
   */
  public function index()
  {
    //$movies = $this->getDoctrine()->getRepository(Movies::class)->findBy([], ['name' => 'ASC'], 20);
    $movie = $this->getDoctrine()
    ->getRepository(Movies::class)
    ->createQueryBuilder('m')
    ->where('m.name LIKE :name')
    ->setParameter('name', '%'.$findBy['name'].'%')
    ->orderBy('m.'.$orderBy, $asc ? 'ASC' : 'DESC')
    ->setMaxResults(20)
    ->setFirstResult(0)
    ->getQuery()
    ->execute();

    return $this->render('movies/index.html.twig', [
      'movies' => $movie,
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
