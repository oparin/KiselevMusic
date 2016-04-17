<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 05.09.14
 * Time: 17:14
 */

namespace KiselevMusic\UserBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * Class User
 * @package KiselevMusic\UserBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="km_user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    public function __construct()
    {
        parent::__construct();
        // your own logic
    }
} 