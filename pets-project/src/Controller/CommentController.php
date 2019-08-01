<?php

namespace App\Controller;

use App\Entity\AdPets;
use App\Entity\Comment;
use App\Form\CommentType;
use App\Repository\CommentRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/comment")
 */
class CommentController extends AbstractController
{
    /**
     * @Route("/", name="comment_index", methods={"GET"})
     */
    public function index(CommentRepository $commentRepository): Response
    {
        return $this->render('comment/index.html.twig', [
            'comments' => $commentRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new/{ad_pet}", name="comment_new", methods={"GET","POST"})
     */
    public function new(Request $request, AdPets $ad_pet): Response
    {
        $comment = new Comment();
        $date = new \DateTime('@'.strtotime('now'));
        $form = $this->createForm(CommentType::class, $comment);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $comment->setSender($this->getUser());
            $comment->setDate($date);
            $comment->setAdpet($ad_pet);
            $entityManager->persist($comment);
            $entityManager->flush();

            return $this->redirectToRoute('ad_pets_show', ['id' => $ad_pet->getId()]);
        };

        return $this->render('comment/new.html.twig', [
            'comment' => $comment,
            'form' => $form->createView(),
        ]);
    }

}
