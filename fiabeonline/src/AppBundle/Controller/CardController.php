<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class CardController extends Controller
{
    /**
     * @Route("/card/tale/id/{taleId}", name="findAllByTaleId")
     */
    public function findAllByTaleId($taleId)
    {
        $cards = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Card')
            ->findAllByTaleId($taleId);
        return $this->render('card/index.html.twig', array(
                'cards' => $cards)
        );
    }
}