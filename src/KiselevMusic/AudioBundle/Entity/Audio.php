<?php
/**
 * Created by PhpStorm.
 * User: oparin
 * Date: 14.09.14
 * Time: 15:08
 */

namespace KiselevMusic\AudioBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Audio
 * @package KiselevMusic\AudioBundle\Entity
 *
 * @ORM\Entity
 * @ORM\Table(name="km_audio")
 */
class Audio
{
    /**
     * @ORM\Column(type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string", name="file_name")
     */
    protected $fileName;

    /**
     * @ORM\Column(type="boolean")
     */
    protected $public = false;

    /**
     * @ORM\Column(type="string")
     */
    protected $title;

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
     * Set fileName
     *
     * @param string $fileName
     * @return Audio
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set public
     *
     * @param boolean $public
     * @return Audio
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

    /**
     * Set title
     *
     * @param string $title
     * @return Audio
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }
}
