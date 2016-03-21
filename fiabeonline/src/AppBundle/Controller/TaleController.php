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
    /**
     * @Route("/tales/title/asc", name="findAllOrderedByTitleAsc")
     */
    public function findAllOrderedByTitleAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleAsc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/title/desc", name="findAllOrderedByTitleDesc")
     */
    public function findAllOrderedByTitleDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleDesc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/asc", name="findAllOrderedByTaleDateAsc")
     */
    public function findAllOrderedByTaleDateAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateAsc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/desc", name="findAllOrderedByTaleDateDesc")
     */
    public function findAllOrderedByTaleDateDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateDesc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/asc", name="findAllOrderedByTaleScoreAsc")
     */
    public function findAllOrderedByTaleScoreAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreAsc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/desc", name="findAllOrderedByTaleScoreDesc")
     */
    public function findAllOrderedByTaleScoreDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreDesc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/asc", name="findAllOrderedByLikesAsc")
     */
    public function findAllOrderedByLikesAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesAsc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/desc", name="findAllOrderedByLikesDesc")
     */
    public function findAllOrderedByLikesDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesDesc();
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/title/asc/user/{user}", name="findAllByUserOrderedByTitleAsc")
     */
    public function findAllByUserOrderedByTitleAsc($user)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserOrderedByTitleAsc($user);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/desc/user/{user}", name="findAllByUserOrderedByTaleDateDesc")
     */
    public function findAllByUserOrderedByTaleDateDesc($user)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserOrderedByTaleDateDesc($user);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/desc/user/{user}", name="findAllByUserOrderedByTaleScoreDesc")
     */
    public function findAllByUserOrderedByTaleScoreDesc($user)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserOrderedByTaleScoreDesc($user);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/desc/user/{user}", name="findAllByUserOrderedByLikesDesc")
     */
    public function findAllByUserOrderedByLikesDesc($user)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserOrderedByLikesDesc($user);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/title/asc/genre/{genre}", name="findAllByGenreOrderedByTitleAsc")
     */
    public function findAllByGenreOrderedByTitleAsc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreOrderedByTitleAsc($genre);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/desc/user/{user}", name="findAllByGenreOrderedByTaleDateDesc")
     */
    public function findAllByGenreOrderedByTaleDateDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreOrderedByTaleDateDesc($genre);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/desc/user/{user}", name="findAllByGenreOrderedByTaleScoreDesc")
     */
    public function findAllByGenreOrderedByTaleScoreDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreOrderedByTaleScoreDesc($genre);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/desc/user/{user}", name="findAllByGenreOrderedByLikesDesc")
     */
    public function findAllByGenreOrderedByLikesDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreOrderedByLikesDesc($genre);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/one/like/desc", name="findOneMostLiked")
     */
    public function findOneMostLiked()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findOneMostLiked();
        return $this->render('tales/detail.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/delete/id/{id}", name="deleteById")
     */
    public function deleteById($id)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->deleteById($id);
        return $this->render('tale/index.html.twig', array(
                'tales' => $tales)
        );
    }
}
