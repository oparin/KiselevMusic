<?php

namespace KiselevMusic\HomeBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller
{
    /**
     * @Route("/")
     * @Template("KiselevMusicHomeBundle:Home:index.html.twig")
     */
    public function indexAction()
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();
        $posters = $em->getRepository('KiselevMusicAdminBundle:Poster')->findBy(array(), array('date' => 'ASC'));

        return array('posters' => $posters);
    }
}
