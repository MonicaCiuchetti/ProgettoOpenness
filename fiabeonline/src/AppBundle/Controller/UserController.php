<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user/tale/id/{taleId}", name="findOneByTaleId")
     */
    public function findOneByTaleId($taleId)
    {
        $users = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findOneByTaleId($taleId);
        return $this->render('user/index.html.twig', array(
                'users' => $users)
        );
    }

    /**
     * @Route("/users/delete/id/{id}", name="deleteUserById")
     */
    public function deleteOneById($id)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->deleteOneById($id);
    }
}