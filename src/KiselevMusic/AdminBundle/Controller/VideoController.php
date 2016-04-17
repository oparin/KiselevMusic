<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 30.12.14
 * Time: 12:14
 */

namespace KiselevMusic\AdminBundle\Controller;

use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Source\Entity;
use Doctrine\ORM\EntityManager;
use KiselevMusic\AdminBundle\Form\Type\VideoFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class VideoController
 *
 * @package KiselevMusic\AdminBundle\Controller
 */
class VideoController extends Controller
{
    /**
     * @return array
     *
     * @Route("/video")
     */
    public function allVideoAction()
    {
        $source = new Entity('KiselevMusicVideoBundle:Video');
        $grid   = $this->get('grid');
        $grid->setSource($source);

        $grid->hideFilters();
        $grid->hideColumns(array(
            'id',
            'updatedAt',
        ));

        $grid->getColumn('title')->setTitle('Название');
        $grid->getColumn('fileName')->setTitle('Имя файла');
        $grid->getColumn('public')->setTitle('Опубликовано')->setAlign('center');

        $editAction = new RowAction('edit', 'kiselevmusic_admin_video_editvideo');
        $editAction->setRouteParameters(array('id'));
        $grid->addRowAction($editAction);

        $deleteAction = new RowAction('delete', 'kiselevmusic_admin_video_deletevideo');
        $deleteAction->setRouteParameters(array('id'));
        $grid->addRowAction($deleteAction);

        return $grid->getGridResponse('KiselevMusicAdminBundle:Video:all_video.html.twig');
    }

    /**
     * @param int $id
     * @return array
     *
     * @Route("/edit-video/{id}")
 *     @Template("KiselevMusicAdminBundle:Video:edit_video.html.twig")
     */
    public function editVideoAction(Request $request, $id = null)
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();

        if ($id) {
            $video = $em->getRepository('KiselevMusicVideoBundle:Video')->find($id);
        } else {
            $video = null;
        }

        $form = $this->createForm(new VideoFormType(), $video);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $em->persist($data);
                $em->flush();

                return $this->redirect($this->generateUrl('kiselevmusic_admin_video_allvideo'));
            }
        }

        return array(
            'form'  => $form->createView(),
        );
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     *
     * @Route("/delete-video/{id}")
     */
    public function deleteVideo($id)
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();

        $video = $em->getRepository('KiselevMusicVideoBundle:Video')->find($id);

        $em->remove($video);
        $em->flush();

        return $this->redirect($this->generateUrl('kiselevmusic_admin_video_allvideo'));
    }
}