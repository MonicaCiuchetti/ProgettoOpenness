<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaleController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..'),
        ));
    }


     /**
     * @Route("/tales", name="talesindex", defaults={"page" = 1})
     * @Route("/tales/page/{page}", name="tales_index_paginated", requirements={"page" : "\d+"})
     */
    public function talesAction($page)
    {
        //$query = $this->getDoctrine()->getRepository('AppBundle:Post')->queryLatest();

        $paginator = $this->get('knp_paginator');
        /*$tales = array( 
            "1" => array (
               "id" => 1,
               "title" => "la bella e la bestia",
               "notes" => "riassunto",   
               "author" => "monica"
            ),
            
            "2" => array (
               "id" => 2,
               "title" => "cenerontola",
               "notes" => "riassunto",   
               "author" => "anna"
            ),
            
            "3" => array (
               "id" => 3,
               "title" => "biancaneve",
               "notes" => "riassunto",   
               "author" => "monica"
            )
         );*/
         $em = $this->getDoctrine()->getManager();
         $tales = $em->getRepository('AppBundle:Tale')->findAllOrderedByTaleDateAsc();

         $tales = $paginator->paginate($tales, $page, 2);
         $tales->setUsedRoute('tales_index_paginated');

        return $this->render('game/index.html.twig', array('tales' => $tales));
    }

    /**
     * @Route("/tales/{slug}", name="tale", defaults={"id" = 1})
     */
    public function taleShowAction($id)
    {
        return $this->render('game/tale_show.html.twig', array('id' => $id));
    }
}
