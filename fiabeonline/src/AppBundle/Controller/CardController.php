<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CardController extends Controller
{
    /**
     * @Route("/card/find/", name="findAllCards")
     */
    public function findAll()
    {
        $cards = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Card')
            ->findAll();
        return $this->render('test/card.html.twig', array(
                'cards' => $cards)
        );
    }

    /**
     * @Route("/card/find/genres/ids", name="findAllCardsByGenresId")
     */
    public function findAllByGenres()
    {
        $genresId = array("1", "2", "3");

        $cards = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Card')
            ->findAllByGenresId($genresId);
        return $this->render('test/card.html.twig', array(
                'cards' => $cards)
        );
    }

    /**
     * @Route("/card/find/genres/ids/type/id", name="findAllCardsByGenresIdAndByTypeId")
     */
    public function findAllByGenresIdAndByTypeId()
    {
        $genresId = array("1", "2", "3");
        $typeId = "1";

        $cards = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Card')
            ->findAllByGenresIdAndByTypeId($genresId, $typeId);
        return $this->render('test/card.html.twig', array(
                'cards' => $cards)
        );
    }

    /**
     * @Route("/card/find/tale/id/{taleId}", name="findAllCardsByTaleId")
     */
    public function findAllByTaleId($taleId)
    {
        $cards = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Card')
            ->findAllByTaleId($taleId);
        return $this->render('test/card.html.twig', array(
                'cards' => $cards)
        );
    }

    /**
     * @Route("/card/find/type/id/{typeId}", name="findAllCardsByTypeId")
     */
    public function findAllByTypeId($typeId)
    {
        $cards = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Card')
            ->findAllByTypeId($typeId);
        return $this->render('test/card.html.twig', array(
                'cards' => $cards)
        );
    }
}