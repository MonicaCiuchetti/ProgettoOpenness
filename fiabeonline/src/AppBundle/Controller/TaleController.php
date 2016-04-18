<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TaleController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $lastTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findLastPublicTale();
        $bestTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByLikesDesc();
        $correctTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByScoreDesc();

        $bestTaleText = "";
        foreach ($bestTale->getSequences() as $sequence) {
            $bestTaleText .= $sequence->getSeqText();
            $bestTaleText .= " ";
        }

        $correctTaleText = "";
        foreach ($correctTale[0]->getSequences() as $sequence) {
            $correctTaleText .= $sequence->getSeqText();
            $correctTaleText .= " ";
        }

        $lastTaleText = "";
        foreach ($lastTale[0]->getSequences() as $sequence) {
            $correctTaleText .= $sequence->getSeqText();
            $correctTaleText .= " ";
        }


        return $this->render('default/index.html.twig', array(
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..'),
            "lastTale" => $lastTale[0],
            "lastTaleText" => $lastTaleText,
            "bestTale" => $bestTale,
            "bestTaleText" => $bestTaleText,
            "correctTale" => $correctTale[0],
            "correctTaleText" => $correctTaleText
        ));
    }


    /**
     * @Route("/tales", name="talesindex", defaults={"page" = 1})
     * @Route("/tales/page/{page}", name="tales_index_paginated", requirements={"page" : "\d+"})
     */
    public function talesAction($page)
    {
        $paginator = $this->get('knp_paginator');

        $em = $this->getDoctrine()->getManager();
        $tales = $em->getRepository('AppBundle:Tale')->findAllPublicOrderByTaleDateDesc();

        $talesImages =  array();
        $talesText = array();

            foreach ($tales as $tale) {
                $taleText = "";
                $taleImages = array();
                foreach($tale->getSequences() as $sequence){
                    $taleText .= $sequence->getSeqText();
                    $taleText .= " ";
                    foreach ($sequence->getActions() as $action) {
                      $taleImages[] = $action->getCard()->getCardFront();
                    }
                  }
            $talesImages[] = $taleImages;
            $talesText[] = $taleText;

            }


        $tales = $paginator->paginate($tales, $page, 12);
        $tales->setUsedRoute('tales_index_paginated');
        //var_dump($talesImages);
        return $this->render('tales/index.html.twig', array('tales' => $tales, 'talesText' => $talesText, 'talesImages' => $talesImages));
    }

    /**
     * @Route("/tales/find", name="findAllTales")
     */
    public function findAll()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAll();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/insert", name="inserttale")
     */
    public function viewInsertTaleAction(){
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

      return $this->render('test/tale.html.twig', array("genres" => $genres, "types" => $types, "sequenceTypes" => $sequenceTypes));
      //cambiare la vista da renderizzare
    }



    /**
     * @Route("/tales/{idTale}", name="tale")
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


        return $this->render('tales/detail.html.twig', array('tale' => $tale, "taleText" => $taleText, 'sequencesImages' => $sequencesImages));
    }

    /**
     * @Route("/tales/find/title/asc", name="findAllTalesOrderedByTitleAsc")
     */
    public function findAllOrderedByTitleAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/title/desc", name="findAllTalesOrderedByTitleDesc")
     */
    public function findAllOrderedByTitleDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTitleDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/asc", name="findAllTalesOrderedByTaleDateAsc")
     */
    public function findAllOrderedByTaleDateAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/desc", name="findAllTalesOrderedByTaleDateDesc")
     */
    public function findAllOrderedByTaleDateDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleDateDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/asc", name="findAllTalesOrderedByTaleScoreAsc")
     */
    public function findAllOrderedByTaleScoreAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/desc", name="findAllTalesOrderedByTaleScoreDesc")
     */
    public function findAllOrderedByTaleScoreDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByTaleScoreDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/asc", name="findAllTalesOrderedByLikesAsc")
     */
    public function findAllOrderedByLikesAsc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesAsc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/desc", name="findAllTalesOrderedByLikesDesc")
     */
    public function findAllOrderedByLikesDesc()
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllOrderedByLikesDesc();
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/title/asc/user/id/{userId}", name="findAllTalesByUserIdOrderedByTitleAsc")
     */
    public function findAllByUserIdOrderedByTitleAsc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTitleAsc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/desc/user/id/{userId}", name="findAllTalesByUserIdOrderedByTaleDateDesc")
     */
    public function findAllByUserIdOrderedByTaleDateDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTaleDateDesc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/desc/user/id/{userId}", name="findAllTaleByUserIdOrderedByTaleScoreDesc")
     */
    public function findAllByUserIdOrderedByTaleScoreDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByTaleScoreDesc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/desc/user/{user}", name="findAllTalesByUserIdOrderedByLikesDesc")
     */
    public function findAllByUserIdOrderedByLikesDesc($userId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByUserIdOrderedByLikesDesc($userId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/title/asc/genre/{genreId}", name="findAllTalesByGenreIdOrderedByTitleAsc")
     */
    public function findAllByGenreIdOrderedByTitleAsc($genreId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTitleAsc($genreId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/date/desc/genre/{genreId}", name="findAllTalesByGenreIdOrderedByTaleDateDesc")
     */
    public function findAllByGenreIdOrderedByTaleDateDesc($genreId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTaleDateDesc($genreId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/score/desc/user/{genreId}", name="findAllTalesByGenreIdOrderedByTaleScoreDesc")
     */
    public function findAllByGenreIdOrderedByTaleScoreDesc($genreId)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByTaleScoreDesc($genreId);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tales/find/likes/desc/genre/{genre}", name="findAllTalesByGenreIdOrderedByLikesDesc")
     */
    public function findAllByGenreIdOrderedByLikesDesc($genre)
    {
        $tales = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findAllByGenreIdOrderedByLikesDesc($genre);
        return $this->render('test/tale.html.twig', array(
                'tales' => $tales)
        );
    }

    /**
     * @Route("/tale/find/like/", name="findTaleByLikesDesc")
     */
    public function findByLikesDesc()
    {
        $tale = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findByLikesDesc();
        return $this->render('tales/detail.html.twig', array(
                'tale' => $tale)
        );
    }

    /**
     * @Route("/tale/delete/{taleId}", name="deleteTailById")
     */
    public function deleteOneById($taleId)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->deleteById($taleId);
    }
}
