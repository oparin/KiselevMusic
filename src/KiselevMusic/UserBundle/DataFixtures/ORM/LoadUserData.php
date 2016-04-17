<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 28.12.14
 * Time: 15:55
 */

namespace KiselevMusic\UserBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KiselevMusic\UserBundle\Entity\User;

/**
 * Class LoadUserData
 *
 * @package KiselevMusic\UserBundle\DataFixtures\ORM
 */
class LoadUserData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $user = new User();
        $user->setUsername('admin');
        $user->setEmail('admin@admin.com');
        $user->setPlainPassword('admin');
        $user->setEnabled(true);
        $user->addRole('ROLE_ADMIN');
        $manager->persist($user);

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