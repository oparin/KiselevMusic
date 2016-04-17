<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 05.09.14
 * Time: 12:00
 */

namespace KiselevMusic\PhotoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Photo
 * @package KiselevMusic\PhotoBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="km_photo")
 */
class Photo
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $image;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $public = false;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Photo
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return Photo
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return boolean 
     */
    public function getPublic()
    {
        return $this->public;
    }
}
