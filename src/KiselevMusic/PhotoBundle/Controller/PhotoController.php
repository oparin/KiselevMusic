<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 05.09.14
 * Time: 11:17
 */

namespace KiselevMusic\PhotoBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class PhotoController
 * @package KiselevMusic\PhotoBundle\Controller
 *
 * @Route("/photo")
 */
class PhotoController extends Controller
{
    /**
     * @return array
     *
     * @Route("/")
     * @Template("KiselevMusicPhotoBundle::photo.html.twig")
     */
    public function photoAction()
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();
        $qb = $em->getRepository('KiselevMusicPhotoBundle:Photo')->createQueryBuilder('p');
        $qb
            ->where('p.public = :public')
            ->setParameter('public', true);
        $photos = $qb->getQuery()->getResult();

        return array(
            'photos' => $photos
        );
    }
} 