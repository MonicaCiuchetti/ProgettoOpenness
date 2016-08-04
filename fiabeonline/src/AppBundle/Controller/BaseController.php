<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{
  public function render($template, array $data = array(), Response $response = null)
  {
    $lastTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findLastPublicTale();
    $bestTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByLikesDesc();
    $correctTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByScoreDesc();

    $commonData = array(
      'bestTale' => $bestTale,
      'lastTale' => $lastTale[0],
      'correctTale' => $correctTale[0]
    );

    return parent::render($template, $data + $commonData, $response);
  }
}
