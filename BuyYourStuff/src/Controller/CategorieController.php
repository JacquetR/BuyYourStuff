<?php

namespace App\Controller;

use App\Entity\Categorie;
use App\Form\CategorieType;
use App\Repository\CategorieRepository;
use Doctrine\Common\Persistence\ObjectManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CategorieController extends AbstractController {

    /**
     * @var CategorieRepository
     */
    private $repository;

    /**
     * @var ObjectManager
     */
    private $em;

    public function __construct(CategorieRepository $repository, EntityManagerInterface $em)
    {
        $this->repository = $repository;
        $this->em = $em;
    }

    /**
     * @Route("/categorie", name="categorie.index")
     * @return Response
     */
    public function index() {
        $categories = $this->repository->findAll();
        return $this->render('pages/categorie.html.twig', [
            'categories' => $categories
        ]);
    }

    /**
     * @Route("/categorie/new", name="categorie.new")
     * @param Request $request
     * @return Response
     */
    public function new(Request $request) {
        $categorie = new Categorie();
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->em->persist($categorie);
            $this->em->flush();
            return $this->redirectToRoute('categorie.index');
        }

        return $this->render('pages/new.html.twig', [
            'categorie' => $categorie,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/categorie/edit/{id}", name="categorie.edit")
     * @param Categorie $categorie
     * @param Request $request
     * @return Response
     */
    public function edit(Categorie $categorie, Request $request) {
        $form = $this->createForm(CategorieType::class, $categorie);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) {
            $this->em->flush();
            return $this->redirectToRoute('categorie.index');
        }

        return $this->render('pages/edit.html.twig', [
            'categorie' => $categorie,
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/categorie/{id}", name="categorie.search")
     * @param Categorie $categorie
     * @return Response
     */
    public function search(Categorie $categorie) {
        $products = $categorie->getProducts();
        return $this->render('pages/categorieSearch.html.twig', [
            'produits' => $products,
            'categorie' => $categorie
        ]);
    }
}