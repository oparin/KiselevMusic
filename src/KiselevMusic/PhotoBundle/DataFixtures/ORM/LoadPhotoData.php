<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 06.09.14
 * Time: 11:40
 */

namespace KiselevMusic\PhotoBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KiselevMusic\PhotoBundle\Entity\Photo;

/**
 * Class LoadPhotoData
 * @package KiselevMusic\PhotoBundle\DataFixtures\ORM
 */
class LoadPhotoData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $photo = new Photo();
        $photo->setImage('1.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('2.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('3.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('4.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('5.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('6.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('7.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('8.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('9.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

        $photo = new Photo();
        $photo->setImage('10.jpg');
        $photo->setPublic(true);
        $manager->persist($photo);

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