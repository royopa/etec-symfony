<?php

namespace App\Controller;

use App\Entity\Sensor;
use App\Form\SensorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/sensor")
 */
class SensorController extends AbstractController
{
    /**
     * @Route("/", name="sensor_index", methods={"GET"})
     */
    public function index(): Response
    {
        $this->denyAccessUnlessGranted('ROLE_USER');
        
        $sensors = $this->getDoctrine()
            ->getRepository(Sensor::class)
            ->findAll();

        return $this->render('sensor/index.html.twig', [
            'sensors' => $sensors,
        ]);
    }

    /**
     * @Route("/new", name="sensor_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $sensor = new Sensor();
        $form = $this->createForm(SensorType::class, $sensor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($sensor);
            $entityManager->flush();

            return $this->redirectToRoute('sensor_index');
        }

        return $this->render('sensor/new.html.twig', [
            'sensor' => $sensor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sensor_show", methods={"GET"})
     */
    public function show(Sensor $sensor): Response
    {
        return $this->render('sensor/show.html.twig', [
            'sensor' => $sensor,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="sensor_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Sensor $sensor): Response
    {
        $form = $this->createForm(SensorType::class, $sensor);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sensor_index');
        }

        return $this->render('sensor/edit.html.twig', [
            'sensor' => $sensor,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="sensor_delete", methods={"POST"})
     */
    public function delete(Request $request, Sensor $sensor): Response
    {
        if ($this->isCsrfTokenValid('delete'.$sensor->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($sensor);
            $entityManager->flush();
        }

        return $this->redirectToRoute('sensor_index');
    }
}
