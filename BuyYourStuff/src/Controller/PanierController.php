<?php

namespace App\Controller;

use App\Entity\Panier;
use App\Entity\Product;
use App\Repository\PanierRepository;
use App\Repository\ProductRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PanierController extends AbstractController {

    /**
     * @var PanierRepository
     */
    private $panierRepository;

    /**
     * @var ProductRepository
     */
    private $productRepository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(PanierRepository $repository, ProductRepository $repository2, EntityManagerInterface $em)
    {
        $this->panierRepository = $repository;
        $this->productRepository = $repository2;
        $this->em = $em;
    }

    /**
     * @Route("/panier", name="panier.index")
     * @return Response
     */
    public function index() {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $paniers = $user->getPaniers();
        $products = array();
        foreach($paniers as $p) {
            $products[] = $this->productRepository->findById($p->getProduct()->getId());
        }
        return $this->render('pages/panier.html.twig', [
            'products' => $products
        ]);
    }

    /**
     * @Route("/panier/save/{id}", name="panier.save")
     * @param Product $product
     * @return Response
     */
    public function save(Product $product) {
        $panier = new Panier();
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $panier->setUser($user);
        $panier->setProduct($product);
        $this->em->persist($panier);
        $this->em->flush();
        return $this->redirectToRoute('panier.index');
    }

    /**
     * @Route("/panier/delete/{id}", name="panier.delete")
     * @param Product $product
     * @return Response
     */
    public function delete(Product $product) {
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $panier = $this->panierRepository->findByUserAndProduct($user->getId(), $product->getId());
        $this->em->remove($panier[0]);
        $this->em->flush();
        return $this->redirectToRoute('panier.index');
    }
}