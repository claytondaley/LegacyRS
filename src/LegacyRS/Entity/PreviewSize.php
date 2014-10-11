<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PreviewSize
 *
 * @ORM\Table(name="preview_size")
 * @ORM\Entity
 */
class PreviewSize
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ref;

    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=3, nullable=true)
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width;

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height;

    /**
     * @var integer
     *
     * @ORM\Column(name="padtosize", type="integer", nullable=true)
     */
    private $padtosize = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="internal", type="integer", nullable=true)
     */
    private $internal = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="allow_preview", type="integer", nullable=true)
     */
    private $allowPreview = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="allow_restricted", type="integer", nullable=true)
     */
    private $allowRestricted = '0';



    /**
     * Get ref
     *
     * @return integer 
     */
    public function getRef()
    {
        return $this->ref;
    }

    /**
     * Set id
     *
     * @param string $id
     * @return PreviewSize
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return string 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return PreviewSize
     */
    public function setWidth($width)
    {
        $this->width = $width;

        return $this;
    }

    /**
     * Get width
     *
     * @return integer 
     */
    public function getWidth()
    {
        return $this->width;
    }

    /**
     * Set height
     *
     * @param integer $height
     * @return PreviewSize
     */
    public function setHeight($height)
    {
        $this->height = $height;

        return $this;
    }

    /**
     * Get height
     *
     * @return integer 
     */
    public function getHeight()
    {
        return $this->height;
    }

    /**
     * Set padtosize
     *
     * @param integer $padtosize
     * @return PreviewSize
     */
    public function setPadtosize($padtosize)
    {
        $this->padtosize = $padtosize;

        return $this;
    }

    /**
     * Get padtosize
     *
     * @return integer 
     */
    public function getPadtosize()
    {
        return $this->padtosize;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return PreviewSize
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set internal
     *
     * @param integer $internal
     * @return PreviewSize
     */
    public function setInternal($internal)
    {
        $this->internal = $internal;

        return $this;
    }

    /**
     * Get internal
     *
     * @return integer 
     */
    public function getInternal()
    {
        return $this->internal;
    }

    /**
     * Set allowPreview
     *
     * @param integer $allowPreview
     * @return PreviewSize
     */
    public function setAllowPreview($allowPreview)
    {
        $this->allowPreview = $allowPreview;

        return $this;
    }

    /**
     * Get allowPreview
     *
     * @return integer 
     */
    public function getAllowPreview()
    {
        return $this->allowPreview;
    }

    /**
     * Set allowRestricted
     *
     * @param integer $allowRestricted
     * @return PreviewSize
     */
    public function setAllowRestricted($allowRestricted)
    {
        $this->allowRestricted = $allowRestricted;

        return $this;
    }

    /**
     * Get allowRestricted
     *
     * @return integer 
     */
    public function getAllowRestricted()
    {
        return $this->allowRestricted;
    }
}
