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
     * @Route("/tales/title/asc", name="findAllTalesOrderedByTitleAsc")
     */
    public function findAllOrderedByTitleAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleAsc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/title/desc", name="findAllTalesOrderedByTitleDesc")
     */
    public function findAllOrderedByTitleDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleDesc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/asc", name="findAllTalesOrderedByTaleDateAsc")
     */
    public function findAllOrderedByTaleDateAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateAsc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/desc", name="findAllTalesOrderedByTaleDateDesc")
     */
    public function findAllOrderedByTaleDateDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateDesc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/asc", name="findAllTalesOrderedByTaleScoreAsc")
     */
    public function findAllOrderedByTaleScoreAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreAsc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/desc", name="findAllTalesOrderedByTaleScoreDesc")
     */
    public function findAllOrderedByTaleScoreDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreDesc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/asc", name="findAllTalesOrderedByLikesAsc")
     */
    public function findAllOrderedByLikesAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesAsc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/desc", name="findAllTalesOrderedByLikesDesc")
     */
    public function findAllOrderedByLikesDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesDesc();
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/title/asc/user/id/{userId}", name="findAllTalesByUserIdOrderedByTitleAsc")
     */
    public function findAllByUserIdOrderedByTitleAsc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTitleAsc($userId);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/desc/user/id/{userId}", name="findAllTalesByUserIdOrderedByTaleDateDesc")
     */
    public function findAllByUserIdOrderedByTaleDateDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTaleDateDesc($userId);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/desc/user/id/{userId}", name="findAllTaleByUserIdOrderedByTaleScoreDesc")
     */
    public function findAllByUserIdOrderedByTaleScoreDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTaleScoreDesc($userId);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/desc/user/{user}", name="findAllTalesByUserIdOrderedByLikesDesc")
     */
    public function findAllByUserIdOrderedByLikesDesc($user)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByLikesDesc($user);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/title/asc/genre/{genre}", name="findAllTalesByGenreIdOrderedByTitleAsc")
     */
    public function findAllByGenreIdOrderedByTitleAsc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTitleAsc($genre);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/date/desc/user/{user}", name="findAllTalesByGenreOrderedByTaleDateDesc")
     */
    public function findAllByGenreIdOrderedByTaleDateDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTaleDateDesc($genre);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/score/desc/user/{user}", name="findAllTalesByGenreOrderedByTaleScoreDesc")
     */
    public function findAllByGenreIdOrderedByTaleScoreDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTaleScoreDesc($genre);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/likes/desc/genre/{genre}", name="findAllTalesByGenreOrderedByLikesDesc")
     */
    public function findAllByGenreIdOrderedByLikesDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByLikesDesc($genre);
        return $this->render('tales/index.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/one/like/desc", name="findOneByLikesDesc")
     */
    public function findOneByLikesDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findOneByLikesDesc();
        return $this->render('tales/detail.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/delete/id/{id}", name="deleteTailById")
     */
    public function deleteOneById($id)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->deleteOneById($id);
    }
}
