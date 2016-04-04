<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserLikeController extends Controller
{
    /**
     * @Route("/userlike/find", name="findAllUserLikes")
     */
    public function findAll()
    {
        $userlikes = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:UserLike')
            ->findAll();
        return $this->render('test/userlike.html.twig', array(
                'userlikes' => $userlikes)
        );
    }

    /**
     * @Route("/userlike/delete/tale/id/{taleId}/user/id/{userId}", name="deleteUserLikeById")
     */
    public function deleteById($taleId, $userId)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:UserLike')
            ->deleteById($taleId, $userId);
    }
}