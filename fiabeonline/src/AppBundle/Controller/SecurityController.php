<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SecurityController extends Controller
{
	/**
     * @Route("/user", name="userIndex")
     */
    public function indexAction(Request $request)
    {
        return $this->render('security/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ));
    }
    /**
     * @Route("/user/insert", name="userInsert")
     */
    public function insertAction(Request $request)
    {
        return $this->render('security/insert.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
        ));
    }
}
