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
     * @Route("/logs/delete/id/{id}", name="deleteLogById")
     */
    public function deleteOneById($id)
    {
        $this->getDoctrine()
            ->getManager()
            ->getRepository('AppBundle:Log')
            ->deleteOneById($id);
    }
}