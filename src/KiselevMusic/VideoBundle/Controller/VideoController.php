<?php
/**
 * Created by PhpStorm.
 * User: Администратор
 * Date: 19.09.14
 * Time: 22:54
 */

namespace KiselevMusic\VideoBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class VideoController
 * @package KiselevMusic\VideoBundle\Controller
 *
 * @Route("/video")
 */
class VideoController extends Controller
{
    /**
     * @return array
     *
     * @Route("/")
     * @Template("KiselevMusicVideoBundle::video.html.twig")
     */
    public function videoAction()
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();
        $qb = $em->getRepository('KiselevMusicVideoBundle:Video')->createQueryBuilder('v');
        $qb
            ->where('v.public = :public')
            ->setParameter('public', true);
        $videos = $qb->getQuery()->getResult();

        return array(
            'videos' => $videos
        );
    }
} 