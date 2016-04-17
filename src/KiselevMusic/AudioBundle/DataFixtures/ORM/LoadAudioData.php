<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 14.09.14
 * Time: 15:35
 */

namespace KiselevMusic\AudioBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use KiselevMusic\AudioBundle\Entity\Audio;

class LoadAudioData implements FixtureInterface
{
    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $audio = new Audio();
        $audio->setFileName('bojya_korovka.mp3');
        $audio->setTitle('Божья коровка');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('ishu_druzey.mp3');
        $audio->setTitle('Ищу друзей');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('ne_poker.mp3');
        $audio->setTitle('Не покер');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('pepsu.mp3');
        $audio->setTitle('Пепсу');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('voina.mp3');
        $audio->setTitle('Война');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('ya_derevo.mp3');
        $audio->setTitle('Я-дерево');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('ne_poimu.mp3');
        $audio->setTitle('Не пойму');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('poluver.mp3');
        $audio->setTitle('Полувер');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('ne_tu_la_ve.mp3');
        $audio->setTitle('Не-ту-ла-вэ');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('mi_snova_vmeste.mp3');
        $audio->setTitle('Мы снова вместе');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('uedu.mp3');
        $audio->setTitle('Уеду...');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('ne_kisni.mp3');
        $audio->setTitle('Не кисни');
        $audio->setPublic(true);
        $manager->persist($audio);

        $audio = new Audio();
        $audio->setFileName('moemu_dedu.mp3');
        $audio->setTitle('Моему деду');
        $audio->setPublic(true);
        $manager->persist($audio);

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