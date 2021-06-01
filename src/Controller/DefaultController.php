<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {
        return $this->render('default/index.html.twig', [
            'controller_name' => 'DefaultController',
        ]);
    }

    /**
     * @Route("/product_backlog", name="product_backlog_index")
     */
    public function product_backlog(): Response
    {
        return $this->render('documentos/product_backlog.html.twig', [
        ]);
    }

    /**
     * @Route("/diagrama_casos_uso", name="diagrama_casos_uso_index")
     */
    public function diagrama_casos_uso(): Response
    {
        return $this->render('documentos/diagrama_casos_uso.html.twig', [
        ]);
    }
    
    /**
     * @Route("/diagrama_classes", name="diagrama_classes_index")
     */
    public function diagrama_classes(): Response
    {
        return $this->render('documentos/diagrama_classes.html.twig', [
        ]);
    }    
}
