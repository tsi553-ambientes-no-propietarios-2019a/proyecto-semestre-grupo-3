<?php

namespace App\Controller;

use App\Entity\AdPets;
use App\Form\AdPetsType;
use App\Repository\AdPetsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/anuncio")
 */
class AdPetsController extends AbstractController
{
    /**
     * @Route("/", name="ad_pets_index", methods={"GET"})
     */
    public function index(AdPetsRepository $adPetsRepository): Response
    {
        return $this->render('ad_pets/index.html.twig', [
            'ad_pets' => $adPetsRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="ad_pets_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $adPet = new AdPets();
        $form = $this->createForm(AdPetsType::class, $adPet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $adPet->setIdUser($this->getUser());
            $entityManager->persist($adPet);
            $entityManager->flush();

            return $this->redirectToRoute('ad_pets_index');
        }

        return $this->render('ad_pets/new.html.twig', [
            'ad_pet' => $adPet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ad_pets_show", methods={"GET"})
     */
    public function show(AdPets $adPet): Response
    {
        return $this->render('ad_pets/show.html.twig', [
            'ad_pet' => $adPet,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="ad_pets_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, AdPets $adPet): Response
    {
        $form = $this->createForm(AdPetsType::class, $adPet);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ad_pets_index', [
                'id' => $adPet->getId(),
            ]);
        }

        return $this->render('ad_pets/edit.html.twig', [
            'ad_pet' => $adPet,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="ad_pets_delete", methods={"DELETE"})
     */
    public function delete(Request $request, AdPets $adPet): Response
    {
        if ($this->isCsrfTokenValid('delete'.$adPet->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($adPet);
            $entityManager->flush();
        }

        return $this->redirectToRoute('ad_pets_index');
    }
}
