<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AppBundle\Entity\Tale;
use AppBundle\Form\Type\TaleType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;

class UserController extends BaseController
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

        return $this->render('user/index.html.twig', array(
          'tales' => $tales
        ));
    }

    /**
     * @Route("/user/tale/insert", name="userInsertTale")
     * @Method({"GET", "POST"})
     */
    public function insertAction(Request $request)
    {
       $tale = new Tale();

       $user=$this->getUser();

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

      $form = $this->createForm(new TaleType(), $tale);

      $form->handleRequest($request);
      if ($form->isSubmitted() && $form->isValid()) {
            //$tale->setSlug($this->get('slugger')->slugify($tale->getTitle()));
            //istanza fiaba con attibuti di default
            $taleTitle = $request->request->get('taleTitle');

            $tale = new \AppBundle\Entity\Tale();
            $tale->setTaleTitle($taleTitle);
            $tale->setTaleScore(0);
            $tale->setTaleDate(new \DateTime("now")   );
            $tale->setIsPublic(false);
            $tale->setUser($user);

            $taleAuthor = $request->request->get('taleAuthor');
            if ($taleAuthor=="") {
              $tale->setTaleAuthor($user->getUsername());
            }
            else {
              $tale->setTaleAuthor($taleAuthor);
            }
            $taleTypeId = $request->request->get('taleTypeId');

            $taleGenres = $request->get('taleGenreId');
            $entityManager = $this->getDoctrine()->getManager();

            if($taleGenres!=0){
              foreach($taleGenres as $taleGenresId) {
                  $genre = $entityManager->getRepository('AppBundle:Genre')->findById($taleGenresId);
                  $taleGenre = new \AppBundle\Entity\TaleGenre();
                  $taleGenre->setGenre($genre[0]);
                  $taleGenre->setTale($tale);
                  $entityManager->persist($taleGenre);
              }
            }

            $taleType = $entityManager->getRepository('AppBundle:Type')->findById($taleTypeId);
            $tale->setType($taleType[0]);

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($tale);
            $entityManager->flush();

            // Flash messages are used to notify the user about the result of the
            // actions. They are deleted automatically from the session as soon
            // as they are accessed.
            // See http://symfony.com/doc/current/book/controller.html#flash-messages
            $this->addFlash('success', 'Fiaba creata con successo!');

            if ($form->get('save')->isClicked()) {
              return $this->redirect($this->generateUrl('userInsertTale').'#step-2');
            }

            return $this->redirectToRoute('userTales');
        }

      return $this->render('user/insert.html.twig', array(
          "genres" => $genres,
          "types" => $types,
          "sequenceTypes" => $sequenceTypes,
          'tale' => $tale,
          'form' => $form->createView()
          ));

    }

    /**
     * @Route("/user/tale/{idTale}", name="userShowTale")
     */
    public function taleShowAction($idTale)
    {
        $user = $this->getUser();
        if($user){
            $tale = $this->getDoctrine()
                ->getManager()
                ->getRepository('AppBundle:Tale')
                ->findUserTaleById($idTale,$user->getId());

            if(!empty($tale)){
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

                return $this->render('tales/detail.html.twig', array(
                  'tale' => $tale,
                  "taleText" => $taleText,
                  'sequencesImages' => $sequencesImages
                ));
              }
              return $this->redirectToRoute('userTales');

        }else return $this->redirectToRoute('fos_user_security_login');

    }

    /**
     * @Route("/user/remove/tale", name="userRemoveTale")
     */
    public function taleRemoveAction(Request $request)
    {
      $idTale = $request->request->get('taleId');
      $user = $this->getUser();

      if(!$idTale){
        return $this->redirectToRoute('homepage');
      }

      if($user){
          $result = $this->getDoctrine()
              ->getManager()
              ->getRepository('AppBundle:Tale')
              ->deleteUserTaleById($idTale,$user->getId());

          if($result){
              return new JsonResponse(array('message' => "OK."), 200);
          }else {
              return new JsonResponse(array('message' => "Error."), 400);
          }
      }else {
          return $this->redirectToRoute('fos_user_security_login');
      }

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
