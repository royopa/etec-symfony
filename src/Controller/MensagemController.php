<?php

namespace App\Controller;

use App\Entity\Mensagem;
use App\Form\MensagemType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/mensagem")
 */
class MensagemController extends AbstractController
{
    /**
     * @Route("/", name="mensagem_index", methods={"GET"})
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        
        $mensagems = $this->getDoctrine()
            ->getRepository(Mensagem::class)
            ->findAll();

        return $this->render('mensagem/index.html.twig', [
            'mensagems' => $mensagems,
        ]);
    }

    /**
     * @Route("/new", name="mensagem_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $mensagem = new Mensagem();
        $form = $this->createForm(MensagemType::class, $mensagem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($mensagem);
            $entityManager->flush();

            return $this->redirectToRoute('mensagem_index');
        }

        return $this->render('mensagem/new.html.twig', [
            'mensagem' => $mensagem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mensagem_show", methods={"GET"})
     */
    public function show(Mensagem $mensagem): Response
    {
        return $this->render('mensagem/show.html.twig', [
            'mensagem' => $mensagem,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="mensagem_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Mensagem $mensagem): Response
    {
        $form = $this->createForm(MensagemType::class, $mensagem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('mensagem_index');
        }

        return $this->render('mensagem/edit.html.twig', [
            'mensagem' => $mensagem,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="mensagem_delete", methods={"POST"})
     */
    public function delete(Request $request, Mensagem $mensagem): Response
    {
        if ($this->isCsrfTokenValid('delete'.$mensagem->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($mensagem);
            $entityManager->flush();
        }

        return $this->redirectToRoute('mensagem_index');
    }
}
