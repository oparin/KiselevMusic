<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 28.11.14
 * Time: 22:40
 */

namespace KiselevMusic\AdminBundle\Controller;

use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Source\Entity;
use Doctrine\ORM\EntityManager;
use KiselevMusic\AdminBundle\Form\Type\PosterFormType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PosterController
 * @package KiselevMusic\AdminBundle\Controller
 *
 * @Route("/posters")
 */
class PosterController extends Controller
{
    /**
     * @Route("/all_posters", name="admin_all_posters")
     * @Template("KiselevMusicAdminBundle:Poster:all_posters.html.twig")
     */
    public function allPostersAction()
    {
        $source = new Entity('KiselevMusicAdminBundle:Poster');
        $grid   = $this->get('grid');
        $grid->setSource($source);

        $grid->hideFilters();
        $grid->hideColumns(array(
            'id'
        ));

        $grid->getColumn('date')->setTitle('Дата');
        $grid->getColumn('description')->setTitle('Текст')->setAlign('center');

        $editAction = new RowAction('edit', 'admin_add_poster');
        $editAction->setRouteParameters(array('id'));
        $grid->addRowAction($editAction);

        $deleteAction = new RowAction('delete', 'admin_delete_poster');
        $deleteAction->setRouteParameters(array('id'));
        $grid->addRowAction($deleteAction);

        return $grid->getGridResponse('KiselevMusicAdminBundle:Poster:all_posters.html.twig');
    }

    /**
     * @Route("/add_poster/{id}", name="admin_add_poster")
     * @Template("KiselevMusicAdminBundle:Poster:add_poster.html.twig")
     */
    public function addPosterAction(Request $request, $id = null)
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();

        if ($id) {
            $poster = $em->getRepository('KiselevMusicAdminBundle:Poster')->find($id);
        } else {
            $poster = null;
        }
        $form = $this->createForm(new PosterFormType(), $poster);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                if (!$id) {
                    $data = $form->getData();
                    $em->persist($data);
                }
                $em->flush();

                return $this->redirect($this->generateUrl('admin_all_posters'));
            }
        }
        return array(
            'form'  => $form->createView(),
        );
    }

    /**
     * @Route("/delete_poster/{id}", name="admin_delete_poster")
     */
    public function deletePosterAction($id)
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();

        $poster = $em->getRepository('KiselevMusicAdminBundle:Poster')->find($id);
        $em->remove($poster);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_all_posters'));
    }
}