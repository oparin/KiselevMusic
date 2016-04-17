<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 21.09.14
 * Time: 6:54
 */

namespace KiselevMusic\HomeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class ContactsController
 * @package KiselevMusic\HomeBundle\Controller
 */
class ContactsController extends Controller
{
    /**
     * @param Request $request
     * @return array
     *
     * @Route("/contacts")
     * @Template("KiselevMusicHomeBundle:Contacts:contacts.html.twig")
     */
    public function contactsAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $name       = $request->request->get('name');
            $email      = $request->request->get('email');
            $message    = $request->request->get('message');

            $string = 'Name: ' . $name . "\r\n" . 'Email: '  . $email . "\r\n" . $message;

            $message = \Swift_Message::newInstance()
                ->setSubject('KiselevMusic.ru')
                ->setFrom('kiselev_music@mail.ru')
                ->setTo('kiselev_music@mail.ru')
                ->setBody($string)
            ;
            $this->get('mailer')->send($message);

            $this->get('session')->getFlashBag()->add(
                'notice',
                'Сообщение отправлено!'
            );
        }


        return array(

        );
    }
} 