<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class UserController extends Controller
{
    /**
     * @Route("/user/find/log/id/{logId}", name="findUserByLogId")
     */
    public function findByLogId($logId)
    {
        $users = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findByTaleId($logId);
        return $this->render('test/user.html.twig', array(
                'users' => $users)
        );
    }

    /**
     * @Route("/user/find/tale/id/{taleId}", name="findUserByTaleId")
     */
    public function findByTaleId($taleId)
    {
        $users = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->findByTaleId($taleId);
        return $this->render('test/user.html.twig', array(
                'users' => $users)
        );
    }


    /**
     * @Route("/user/tales", name="usertales")
     * @Route("/user/tales/page/{page}", name="user_tales_paginated", defaults={"page" = 1})
     */
    public function findUserTalesAction($page)
    {
        $paginator = $this->get('knp_paginator');
        $tales = $this->getUser()->getTales();

        $tales = $paginator->paginate($tales, $page, 12);
        $tales->setUsedRoute('user_tales_paginated');


        return $this->render('test/view_userindex.html.twig', array('tales' => $tales));//Da testare, in attesa della vista
    }



    /**
     * @Route("/user/delete/id/{userId}", name="deleteUserById")
     */
    public function deleteById($userId)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:User')
            ->deleteOneById($userId);
    }
}
