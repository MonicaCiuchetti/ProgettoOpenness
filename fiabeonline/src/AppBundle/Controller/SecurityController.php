<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
  /**
     * @Route("/login", name="login")
     */
    public function loginAction(Request $request)
    {
        return $this->render('security/login.html.twig', array(
            //last username enter by the user
            'last_username' => "monica",
            'error' => "error",
         )
        );
    }
}
