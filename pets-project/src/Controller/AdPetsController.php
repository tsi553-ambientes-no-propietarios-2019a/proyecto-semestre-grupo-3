<?php

namespace App\Controller;

use App\Entity\AdPets;
use App\Entity\Comment;
use App\Form\AdPetsType;
use App\Repository\AdPetsRepository;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

use App\Entity\User;

/**
 * @Route("/anuncio")
 */
class AdPetsController extends AbstractController
{
    /**
     * @Route("/", name="ad_pets_index", methods={"GET"})
    * @IsGranted("IS_AUTHENTICATED_FULLY")

     */
    public function index(AdPetsRepository $adPetsRepository): Response
    {
        $user = $this->getUser()->getId(); #codigo para obtener el id del usuario
        return $this->render('ad_pets/index.html.twig', [
            'ad_pets' => $adPetsRepository->findBy(["idUser"=> $user]),
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
            $adPet->setStatus(1);
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

        $entityManager = $this->getDoctrine()->getManager();
        $nom = $entityManager->getRepository(Comment::class)->getsender($adPet);
        return $this->render('ad_pets/show.html.twig',
            array('ad_pet' => $adPet,'nom' => $nom)

        );
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


    /**
     * @Route("/busq/{id}", name="ad_pets_Busq", methods={"GET"})
     *
     */
    public function Busq($id, AdPetsRepository $adPetsRepository): Response
    {
        return $this->render('search/index.html.twig', [
            'ad_pets' => $adPetsRepository->findBy(["categorypets"=> $id]),
        ]);
    }

    /**
     * @Route("/busq/type/{id}", name="ad_pets_Busq_type", methods={"GET"})
     *
     */
    public function BusqType($id, AdPetsRepository $adPetsRepository): Response
    {
        return $this->render('search/index.html.twig', [
            'ad_pets' => $adPetsRepository->findBy(["typepets"=> $id]),
        ]);
    }

}
