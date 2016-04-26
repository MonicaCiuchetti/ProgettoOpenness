<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Tale;

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
     * @Route("/user/tales", name="userTales", defaults={"page" = 1})
     * @Route("/user/tales/page/{page}", name="userTalesPaginated", defaults={"page" = 1})
     */
    public function findUserTalesAction($page)
    {
        $paginator = $this->get('knp_paginator');
        $tales = $this->getUser()->getTales();
        $tales = $paginator->paginate($tales, $page, 5);
        $tales->setUsedRoute('userTalesPaginated');
        return $this->render('user/index.html.twig', array('tales' => $tales));
    }

    /**
     * @Route("/user/tale/insert", name="userInsertTale")
     */
    public function insertAction()
    {
       $genres = $this->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Genre')
          ->findAll();

      $types = $this->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:Type')
          ->findAll();

      $sequenceTypes = $this->getDoctrine()
          ->getManager()
          ->getRepository('AppBundle:SequenceType')
          ->findAll();

      return $this->render('user/insert.html.twig', array("genres" => $genres, "types" => $types, "sequenceTypes" => $sequenceTypes));
   
    }

    /**
     * @Route("/user/tale/{idTale}", name="userShowTale")
     */
    public function taleShowAction($idTale)
    {
        $tale = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findById($idTale);

        $taleText = "";

        $sequencesImages = array();
        foreach ($tale[0]->getSequences() as $sequence) {
           //Concateno testi di ogni sequenza
            $taleText .= $sequence->getSeqText();
            //Li separo con lo spazio
            $taleText .= " ";
            //creo l'array che associa le sequenze ai fronti delle proprie carte
            $sequenceImages = array();
            foreach ($sequence->getActions() as $action) {
                $sequenceImages[] = $action->getCard()->getCardFront();
              }
            $sequencesImages[] = $sequenceImages;
        }


        return $this->render('user/detail.html.twig', array('tale' => $tale, "taleText" => $taleText, 'sequencesImages' => $sequencesImages));
    }

    /**
     * Displays a form to edit an existing Tale entity.
     *
     * @Route("/user/tale/{idTale}/edit", name="userEditTale")
     * @Method({"GET", "POST"})
     */
    public function editAction($idTale)
    {
        $tale = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findById($idTale);

        $taleText = "";

        $sequencesImages = array();
        foreach ($tale[0]->getSequences() as $sequence) {
           //Concateno testi di ogni sequenza
            $taleText .= $sequence->getSeqText();
            //Li separo con lo spazio
            $taleText .= " ";
            //creo l'array che associa le sequenze ai fronti delle proprie carte
            $sequenceImages = array();
            foreach ($sequence->getActions() as $action) {
                $sequenceImages[] = $action->getCard()->getCardFront();
              }
            $sequencesImages[] = $sequenceImages;
        }


        return $this->render('user/edit.html.twig', array('tale' => $tale, "taleText" => $taleText, 'sequencesImages' => $sequencesImages));
    }

   
}
