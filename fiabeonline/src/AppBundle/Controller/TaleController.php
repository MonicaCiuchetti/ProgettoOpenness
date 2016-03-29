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
        return $this->render('default/card.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ));
    }


    /**
     * @Route("/tales", name="talesindex", defaults={"page" = 1})
     * @Route("/tales/page/{page}", name="tales_index_paginated", requirements={"page" : "\d+"})
     */
    public function talesAction($page)
    {
        $paginator = $this->get('knp_paginator');

        $em = $this->getDoctrine()->getManager();
        $tales = $em->getRepository('AppBundle:Tale')->findAllOrderedByTaleDateAsc();

        $tales = $paginator->paginate($tales, $page, 12);
        $tales->setUsedRoute('tales_index_paginated');

        return $this->render('game/card.html.twig', array('tales' => $tales));
    }

    /**
     * @Route("/tales/find", name="findAllTales")
     */
    public function findAll()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAll();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/{slug}", name="tale", defaults={"id" = 1})
     */
    public function taleShowAction($id)
    {
        return $this->render('game/tale_show.html.twig', array('id' => $id));
    }

    /**
     * @Route("/tales/find/title/asc", name="findAllTalesOrderedByTitleAsc")
     */
    public function findAllOrderedByTitleAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/title/desc", name="findAllTalesOrderedByTitleDesc")
     */
    public function findAllOrderedByTitleDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/asc", name="findAllTalesOrderedByTaleDateAsc")
     */
    public function findAllOrderedByTaleDateAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/desc", name="findAllTalesOrderedByTaleDateDesc")
     */
    public function findAllOrderedByTaleDateDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/asc", name="findAllTalesOrderedByTaleScoreAsc")
     */
    public function findAllOrderedByTaleScoreAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/desc", name="findAllTalesOrderedByTaleScoreDesc")
     */
    public function findAllOrderedByTaleScoreDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/asc", name="findAllTalesOrderedByLikesAsc")
     */
    public function findAllOrderedByLikesAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/desc", name="findAllTalesOrderedByLikesDesc")
     */
    public function findAllOrderedByLikesDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/title/asc/user/id/{userId}", name="findAllTalesByUserIdOrderedByTitleAsc")
     */
    public function findAllByUserIdOrderedByTitleAsc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTitleAsc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/desc/user/id/{userId}", name="findAllTalesByUserIdOrderedByTaleDateDesc")
     */
    public function findAllByUserIdOrderedByTaleDateDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTaleDateDesc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/desc/user/id/{userId}", name="findAllTaleByUserIdOrderedByTaleScoreDesc")
     */
    public function findAllByUserIdOrderedByTaleScoreDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTaleScoreDesc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/desc/user/{user}", name="findAllTalesByUserIdOrderedByLikesDesc")
     */
    public function findAllByUserIdOrderedByLikesDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByLikesDesc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/title/asc/genre/{genreId}", name="findAllTalesByGenreIdOrderedByTitleAsc")
     */
    public function findAllByGenreIdOrderedByTitleAsc($genreId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTitleAsc($genreId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/desc/genre/{genreId}", name="findAllTalesByGenreIdOrderedByTaleDateDesc")
     */
    public function findAllByGenreIdOrderedByTaleDateDesc($genreId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTaleDateDesc($genreId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/desc/user/{genreId}", name="findAllTalesByGenreIdOrderedByTaleScoreDesc")
     */
    public function findAllByGenreIdOrderedByTaleScoreDesc($genreId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTaleScoreDesc($genreId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/desc/genre/{genre}", name="findAllTalesByGenreIdOrderedByLikesDesc")
     */
    public function findAllByGenreIdOrderedByLikesDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByLikesDesc($genre);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tale/find/one/like/desc", name="findTaleByLikesDesc")
     */
    public function findByLikesDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findByLikesDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tale/delete/id/{taleId}", name="deleteTailById")
     */
    public function deleteOneById($taleId)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->deleteById($taleId);
    }
}
