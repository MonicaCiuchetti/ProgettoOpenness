<?php
/**
 * Created by PhpStorm.
 * User: Alex
 * Date: 22/03/2016
 * Time: 22:14
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LogController extends Controller
{
    /**
     * @Route("/log/find/", name="findAllLogs")
     */
    public function findAll()
    {
        $logs = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Log')
            ->findAll();
        return $this->render('test/log.html.twig', array(
                'logs' => $logs)
        );
    }

    /**
     * @Route("/log/find/logTime/desc", name="findAllLogsOrderByLogTimeDesc")
     */
    public function findAllOrderByLogTimeDesc()
    {
        $logs = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Log')
            ->findAll();
        return $this->render('test/log.html.twig', array(
                'logs' => $logs)
        );
    }

    /**
     * @Route("/log/find/user/id/{userId}", name="findAllLogsByUserId")
     */
    public function findAllByUserId($userId)
    {
        $logs = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Log')
            ->findAllByUserId($userId);
        return $this->render('test/log.html.twig', array(
                'logs' => $logs)
        );
    }

    /**
     * @Route("/log/find/logTime/desc/user/id/{userId}", name="findAllLogsByLogTimeOrderByLogTimeDesc")
     */
    public function findAllByUserIdOrderByLogTimeDesc($userId)
    {
        $logs = $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Log')
            ->findAllByUserIdOrderByLogTimeDesc($userId);
        return $this->render('test/log.html.twig', array(
                'logs' => $logs)
        );
    }

    /**
     * @Route("/log/delete/id/{cardId}", name="deleteLogById")
     */
    public function deleteById($cardId)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Log')
            ->deleteById($cardId);
        //View is missing
    }
}
