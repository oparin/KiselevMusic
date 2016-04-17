<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 14.09.14
 * Time: 17:28
 */

namespace KiselevMusic\AudioBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class AudioController
 * @package KiselevMusic\AudioBundle\Controller
 *
 * @Route("/audio")
 */
class AudioController extends Controller
{
    /**
     * @return array
     *
     * @Route("/poluver")
     * @Template("KiselevMusicAudioBundle::poluver.html.twig")
     */
    public function poluverAction()
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();
        $qb = $em->getRepository('KiselevMusicAudioBundle:Audio')->createQueryBuilder('a');
        $qb
            ->where('a.public = :public')
            ->setParameter('public', true);
        $songs = $qb->getQuery()->getResult();

        return array(
            'songs' => $songs
        );
    }

    /**
     * @param $fileName
     *
     * @Route("/download/{fileName}")
     * @Template("KiselevMusicAudioBundle::poluver.html.twig")
     */
    public function downloadAction($fileName)
    {
//        var_dump(realpath('uploads/audio/' . $fileName));exit;
        $file = 'uploads/audio/' . $fileName;

        $response = new Response();
        // Set headers
        $response->headers->set('Cache-Control', 'private');
        $response->headers->set('Content-type', mime_content_type($file));
        $response->headers->set('Content-Disposition', 'attachment; filename="' . basename($file) . '";');
        $response->headers->set('Content-length', filesize($file));

        $response->sendHeaders();

        $response->setContent(readfile($file));

        return $response;
    }
} 