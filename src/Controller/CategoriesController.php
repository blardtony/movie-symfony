<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Categories;

class CategoriesController extends AbstractController
{
    /**
     * @Route("/categories/{id}", name="categories")
     */
    public function show($id)
    {
      $category = $this->getDoctrine()->getRepository(Categories::class)->find($id);
      return $this->render('categories/index.html.twig', [
        'category' => $category,
      ]);
  }
}
