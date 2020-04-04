<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class SearchController extends AbstractController {

    /**
     * @var ProductRepository
     */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @Route("/search", name="search")
     * @return Response
     */
    public function index(Request $request): Response {
        $name = $request->request->get("recherche", "default");
        $produits = $this->repository->findByName($name);
        return $this->render('pages/search.html.twig', [
            'produits' => $produits,
            'name' => $name
        ]);
    }
}