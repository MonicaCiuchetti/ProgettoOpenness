<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\VarDumper\VarDumper;
use Symfony\Component\HttpFoundation\JsonResponse;

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
            $lastTaleText .= $sequence->getSeqText();
            $lastTaleText .= " ";
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

        $lastTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findLastPublicTale();
        $bestTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByLikesDesc();
        $correctTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByScoreDesc();

        //var_dump($talesImages);
        return $this->render('tales/index.html.twig', array(
          'tales' => $tales, 
          'talesText' => $talesText, 
          'talesImages' => $talesImages, 
          'bestTale' => $bestTale, 
          'lastTale' => $lastTale[0], 
          'correctTale' => $correctTale[0]
          ));
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

        if(!empty($tale)){

          $taleText = "";


          $sequencesImages = array();
          foreach ($tale[0]->getSequences() as $sequence) {
             //Concateno testi di ogni sequenza
              //$taleText .= $sequence->getSeqText();
              $text = $sequence->getSeqText();
              $text = str_replace("\n","",$text);
              $text .= "\n\n";
              //Li separo con lo spazio
              //$taleText .= " ";
              $taleText .= $text;

              //creo l'array che associa le sequenze ai fronti delle proprie carte
              $sequenceImages = array();
              foreach ($sequence->getActions() as $action) {
                  $sequenceImages[] = $action->getCard()->getCardFront();
                }
              $sequencesImages[] = $sequenceImages;
          }

          $lastTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findLastPublicTale();
          $bestTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByLikesDesc();
          $correctTale = $this->getDoctrine()->getManager()->getRepository('AppBundle:Tale')->findByScoreDesc();
  

          return $this->render('tales/detail.html.twig', array(
            'tale' => $tale, 
            "taleText" => $taleText, 
            'sequencesImages' => $sequencesImages,
            'bestTale' => $bestTale, 
            'lastTale' => $lastTale[0], 
            'correctTale' => $correctTale[0]
            ));
        }else return $this->redirectToRoute('homepage');
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
     * @Route("/tale/addLike", name="addLike")
     */
    public function addLike(Request $request){

          //var_dump($request);
          $user=$this->getUser();
          /*
            Verifico che l'utente sia loggato
          */
          if($user!=null){
                  //dump($request);
                  $taleId = $request->request->get('taleId') ;
                  $em=$this->getDoctrine()->getManager();

                  $result = $em->getRepository('AppBundle:UserLike')->findByIds($taleId,$user->getId());
                  /*var_dump($result);
                  $ciao=$ciccio;*/
                  $tale = $em->getRepository('AppBundle:Tale')->findById($taleId);
                  if (!$tale) {
                      throw $this->createNotFoundException(
                          'No tale found for id '.$taleId);
                  }

                  $userLike = new \AppBundle\Entity\UserLike();
                  $userLike->setUser($user);
                  $userLike->setTale($tale[0]);

                  $message = '';
                  if(empty($result)){
                        //return $this->redirectToRoute('fos_user_security_login');
                        $tale[0]->addLike($userLike);
                        $em->persist($tale[0]);
                        $em->flush();
                        $message = "1";//Like inserito
                  }else{
                      $userLike = $em->merge($userLike);
                      $em->remove($userLike);
                      $em->flush();
                      $message = "0";//Like eliminato
                  }
                  return new JsonResponse(array('message' => $message), 200);
        }
        else {
              return $this->redirectToRoute('fos_user_security_login');
        }
    }

    /**
     * @Route("/score/{taleId}", name="score")
     */
    public function getScore($taleId)
    {
        $tale = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Tale')
            ->findById($taleId);

        $tale = $tale[0];

        $maxCards = 8;

        $sequenceTypes = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:SequenceType')
            ->findAll();

        $score = 0;
        $taleSequenceType = array();

        foreach ($tale->getSequences() as $sequence) {

            $taleSequenceType[] = $sequence->getSequenceType()->getId();

            $cards = 0;
            $magicElement = false;
            $hero = false;
            $opponent = false;
            $place = false;

            foreach ($sequence->getActions() as $action) {
                $card = $action->getCard();

                $cards++;

                //Controlla se la carta è nel giusto tipo di sequenza
                foreach ($sequenceTypes as $sequenceType) {
                    if ($sequenceType->getId() == $sequence->getSequenceType()->getId()) {
                        foreach ($sequenceType->getActionsPropp() as $actionPropp) {
                            if ($actionPropp->getCard()->getId() == $actionPropp->getCard()->getId()) {
                                $score += $actionPropp->getScore();
                            }
                        }
                    }
                }

                //Controlla se la carta personaggio svolge la giusta funzione
                if ($card->getCardType()->getId() == 2) {
                    foreach ($card->getPartecipationsDefault() as $partecipationDefault) {
                        foreach ($card->getPartecipations() as $partecipation) {
                            if ($partecipationDefault->getId() == $partecipation->getId()) {
                                $score += $partecipationDefault->getScore();
                            }
                        }
                    }
                }

                //Controlla se la carta elemento magico compare nel giusto tipo di sequenza
                if ($card->getCardType()->getId() == 4) {
                    if ($sequence->getSequenceType()->getId() >= 3) {
                        $magicElement = true;
                        $score += 5;
                    }
                }

                //Controlla se la carta luogo compare almeno una volta nella sequenza
                if (!$place) {
                    if ($card->getCardType()->getId() == 3) {
                        $place = true;
                        $score += 5;
                    }
                }

                //Controlla se la carta luogo compare almeno una volta nella sequenza
                if (!$hero) {
                    if ($card->getCardType()->getId() == 32) {
                        $hero = true;
                        $score += 5;
                    }
                }

                //Controlla se la carta antagonista compare almeno una volta nella sequenza
                if (!$opponent) {
                    if ($card->getCardType()->getId() == 34) {
                        $opponent = true;
                        $score += 5;
                    }
                }
            }

            //Controlla se il numero di carte è eccessivo
            if ($cards > $maxCards) {
                $diff = $cards - $maxCards;
                $score -= $diff * 3;
            }

            //Controlla se l'elemento magio è presente nelle sequenze 4,8
            if (!$magicElement) {
                if ($sequence->getSequenceType()->getId() == 4
                    || $sequence->getSequenceType()->getId() == 8
                ) {
                    $score -= 5;
                }
            }
            //Controlla se l'eroe è presente nelle sequenze 3,4,5,7,8,9
            if (!$hero) {
                if ($sequence->getSequenceType()->getId() == 3
                    || $sequence->getSequenceType()->getId() == 4
                    || $sequence->getSequenceType()->getId() == 5
                    || $sequence->getSequenceType()->getId() == 7
                    || $sequence->getSequenceType()->getId() == 8
                    || $sequence->getSequenceType()->getId() == 9
                ) {
                    $score -= 5;
                }
            }

            //Controlla se l'antagonista è presente nelle sequenze 2,4,6,8
            if (!$opponent) {
                if ($sequence->getSequenceType()->getId() == 2
                    || $sequence->getSequenceType()->getId() == 4
                    || $sequence->getSequenceType()->getId() == 6
                    || $sequence->getSequenceType()->getId() == 8
                ) {
                    $score -= 5;
                }
            }
        }

        //Controlla se la fiaba ha il minimo numero di sequenze
        if (in_array("1", $taleSequenceType) && in_array("2", $taleSequenceType) && in_array("3", $taleSequenceType) && in_array("5", $taleSequenceType)) {
            $score += 5;
        } else
            if (in_array("1", $taleSequenceType) && in_array("2", $taleSequenceType) && in_array("4", $taleSequenceType) && in_array("5", $taleSequenceType)) {
                $score += 5;
            }

        $taleSequenceTypeUnsorted = $taleSequenceType;

        usort($taleSequenceType, function ($a, $b) {
            if ($a == $b) {
                return 0;
            }
            return ($a < $b) ? -1 : 1;
        });

        //Controlla se i tipi di sequenza sono nell'ordine corretto
        if ($taleSequenceTypeUnsorted == $taleSequenceType) {
            $score += 5;
        }

        //Vista da modificare
        return $this->render('test/score.html.twig', array(
                'score' => $score)
        );
    }
}
