<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GameController extends Controller
{

  /**
   * @Route("/game/public", name="publicGame")
   */
  public function indexAction(Request $request)
  {
      $genres = $this->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Genre')
          ->findAll();

      $types = $this->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Type')
          ->findAll();

      $cards = $this->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Card')
          ->findAll();

      $characters = array();
      $places = array();
      $magicElements = array();
      $functions = array();

      foreach ($cards as $card) {
          if($card->getCardType()->getId() == 1) {
              $functions[] = $card;
          } else if($card->getCardType()->getId() == 2) {
              $characters[] = $card;
          } else if($card->getCardType()->getId() == 3) {
              $places[] = $card;
          } else {
              $magicElements[] = $card;
          }
      }
      
      return $this->render('game/publicgame.html.twig', array('genres' => $genres,
          'types' => $types,
          'functions' => $functions,
          'places' => $places,
          'magicElements' => $magicElements,
          'characters' => $characters));
  }
}
