<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductType;
use App\Repository\ProductRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController {

    /**
     * @var ProductRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(ProductRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/product", name="product.index")
     * @return Response
     */
    public function index() {
        $produits = $this->repository->findAll();
        return $this->render('pages/product.html.twig', [
            'produits' => $produits
        ]);
    }

    /**
     * @Route("/product/new", name="product.new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request) {
        $product = new Product();
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($product);
            $this->em->flush();
            return $this->redirectToRoute('product.index');
        }

        return $this->render('pages/new.html.twig', [
            'product' => $product,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/product/edit/{id}", name="product.edit")
     * @param Product $product
     * @param Request $request
     * @return Response
     */
    public function edit(Product $product, Request $request) {
        $form = $this->createForm(ProductType::class, $product);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('product.index');
        }

        return $this->render('pages/edit.html.twig', [
            'product' => $product,
            'form' => $form->createView()
        ]);
    }
}