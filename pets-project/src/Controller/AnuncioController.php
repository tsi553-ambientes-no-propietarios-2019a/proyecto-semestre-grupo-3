<?php

namespace App\Controller;

use App\Entity\Anuncio;
use App\Form\AnuncioType;
use App\Repository\AnuncioRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/anuncio")
 */
class AnuncioController extends AbstractController
{
    /**
     * @Route("/", name="anuncio_index", methods={"GET"})
     */
    public function index(AnuncioRepository $anuncioRepository): Response
    {
        return $this->render('anuncio/index.html.twig', [
            'anuncios' => $anuncioRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="anuncio_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $anuncio = new Anuncio();
        $form = $this->createForm(AnuncioType::class, $anuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($anuncio);
            $entityManager->flush();

            return $this->redirectToRoute('anuncio_index');
        }

        return $this->render('anuncio/new.html.twig', [
            'anuncio' => $anuncio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="anuncio_show", methods={"GET"})
     */
    public function show(Anuncio $anuncio): Response
    {
        return $this->render('anuncio/show.html.twig', [
            'anuncio' => $anuncio,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="anuncio_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Anuncio $anuncio): Response
    {
        $form = $this->createForm(AnuncioType::class, $anuncio);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('anuncio_index', [
                'id' => $anuncio->getId(),
            ]);
        }

        return $this->render('anuncio/edit.html.twig', [
            'anuncio' => $anuncio,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="anuncio_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Anuncio $anuncio): Response
    {
        if ($this->isCsrfTokenValid('delete'.$anuncio->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($anuncio);
            $entityManager->flush();
        }

        return $this->redirectToRoute('anuncio_index');
    }
}
