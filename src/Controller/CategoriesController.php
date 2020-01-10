<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\HttpFoundation\Request;
use Knp\Component\Pager\PaginatorInterface;

use App\Entity\Categories;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories/{id}", name="categories")
     */
    public function show(Request $request, PaginatorInterface $paginator, $id)
    {
      $category = $this->getDoctrine()->getRepository(Categories::class)->find($id);

      if (!$category) {
        return $this->redirectToRoute('movies_list');
      }
      $pagination = $paginator->paginate(
        $category->getMovies(), // Requête contenant les données à paginer (ici nos articles)
        $request->query->getInt('page', 1), // Numéro de la page en cours, passé dans l'URL, 1 si aucune page
        18 // Nombre de résultats par page
      );

      return $this->render('categories/index.html.twig', [
        'categories' => $pagination,
        'category' => $category,
      ]);

    }
}
