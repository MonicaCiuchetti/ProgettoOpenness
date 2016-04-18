<?php

namespace AppBundle\Controller\Admin;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Tale;

class TaleController extends Controller
{
 /**
  * @Route("/admin", name="admin_index")
  * @Route("/admin", name="admin_tale_index")
  * @Method("GET")
  */
public function indexAction()
 {
    if (!$this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
        throw $this->createAccessDeniedException();
    }

    $user = $this->getUser();

    // the above is a shortcut for this
    $user = $this->get('security.token_storage')->getToken()->getUser();
    
    $entityManager = $this->getDoctrine()->getManager();
    $tales = $entityManager->getRepository('AppBundle:Tale')->findAllOrderedByTaleDateAsc();

    return $this->render('admin/game/index.html.twig', array('tales' => $tales));
 }
}
