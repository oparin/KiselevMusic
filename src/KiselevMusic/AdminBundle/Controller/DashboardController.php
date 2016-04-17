<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 13.12.14
 * Time: 12:09
 */

namespace KiselevMusic\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

/**
 * Class DashboardController
 * @package KiselevMusic\AdminBundle\Controller
 */
class DashboardController extends Controller
{
    /**
     * @Route("/")
     * @Template()
     */
    public function indexAction()
    {
        return $this->redirect($this->generateUrl('kiselevmusic_admin_dashboard_dashboard'));
    }

    /**
     * @Route("/dashboard")
     * @Template("KiselevMusicAdminBundle:Dashboard:dashboard.html.twig")
     */
    public function dashboardAction()
    {
        return array(

        );
    }
} 