<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 20.09.14
 * Time: 7:53
 */

namespace KiselevMusic\VideoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KiselevMusic\VideoBundle\Entity\Video;

class LoadVideoData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $video = new Video();
        $video->setFileName('bojya_korovka.mp4');
        $video->setTitle('Божья коровка');
        $video->setPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setFileName('ne_kisni.mp4');
        $video->setTitle('Не кисни');
        $video->setPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setFileName('ne_poker.mp4');
        $video->setTitle('Не покер');
        $video->setPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setFileName('poluver.mp4');
        $video->setTitle('Полувер');
        $video->setPublic(true);
        $manager->persist($video);

        $video = new Video();
        $video->setFileName('pepsu.mp4');
        $video->setTitle('Пэпсу');
        $video->setPublic(true);
        $manager->persist($video);

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 1; // the order in which fixtures will be loaded
    }
} 