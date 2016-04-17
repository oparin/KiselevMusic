<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 2/15/15
 * Time: 1:59 PM
 */

namespace KiselevMusic\AdminBundle\Controller;

use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Source\Entity;
use Doctrine\ORM\EntityManager;
use KiselevMusic\AdminBundle\Form\Type\PhotoFormType;
use KiselevMusic\AdminBundle\Grid\Column\PhotoColumn;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class PhotoController
 * @package KiselevMusic\AdminBundle\Controller
 */
class PhotoController extends Controller
{
    /**
     * @return array
     *
     * @Route("/photo")
     */
    public function allPhotoAction()
    {
        $source = new Entity('KiselevMusicPhotoBundle:Photo');
        $grid   = $this->get('grid');
        $tableAlias = $source->getTableAlias();

        $source->manipulateQuery(
            function ($query) use ($tableAlias)
            {
                /* @var $query \Doctrine\ORM\QueryBuilder */
                $query
                    ->orderBy($tableAlias . '.id', 'DESC');
            }
        );

        $grid->setSource($source);


        $grid->hideFilters();
        $grid->hideColumns(array(
            'id'
        ));

        $grid->getColumn('image')->setTitle('Имя файла');
        $grid->getColumn('public')->setTitle('Опубликовано')->setAlign('center');

        $photo = new PhotoColumn(array(
            'id'    => 'image',
            'field' => 'image',
            'title' => 'Файл',
            'source'    => true,
        ));
        $grid->addColumn($photo, 1);

        $editAction = new RowAction('edit', 'kiselevmusic_admin_photo_editphoto');
        $editAction->setRouteParameters(array('id'));
        $grid->addRowAction($editAction);

        $deleteAction = new RowAction('delete', 'kiselevmusic_admin_video_editvideo');
        $deleteAction->setRouteParameters(array('id'));
        $grid->addRowAction($deleteAction);

        return $grid->getGridResponse('KiselevMusicAdminBundle:Photo:all_photo.html.twig');
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return array
     *
     * @Route("/edit-photo/{id}")
     * @Template("KiselevMusicAdminBundle:Photo:edit_photo.html.twig")
     */
    public function editPhotoAction(Request $request, $id = null)
    {
        /* @var $em EntityManager */
        $em = $this->getDoctrine()->getManager();

        if ($id) {
            $photo = $em->getRepository('KiselevMusicPhotoBundle:Photo')->find($id);
        } else {
            $photo = null;
        }

        $form = $this->createForm(new PhotoFormType(), $photo);

        if ($request->isMethod('POST')) {
            $form->handleRequest($request);
            if ($form->isValid()) {
                $data = $form->getData();
                $em->persist($data);
                $em->flush();

                return $this->redirect($this->generateUrl('kiselevmusic_admin_photo_allphoto'));
            }
        }

        return array(
            'form'  => $form->createView()
        );
    }
}