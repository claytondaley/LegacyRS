<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceDimensions
 *
 * @ORM\Table(name="resource_dimensions")
 * @ORM\Entity
 */
class ResourceDimensions
{
    /**
     * @var integer
     *
     * @ORM\Column(name="resource", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $resource = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="width", type="integer", nullable=true)
     */
    private $width = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="height", type="integer", nullable=true)
     */
    private $height = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="file_size", type="integer", nullable=true)
     */
    private $fileSize = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="resolution", type="integer", nullable=true)
     */
    private $resolution = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="unit", type="string", length=11, nullable=true)
     */
    private $unit = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="page_count", type="integer", nullable=true)
     */
    private $pageCount;



    /**
     * Get resource
     *
     * @return integer 
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set width
     *
     * @param integer $width
     * @return ResourceDimensions
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
     * @return ResourceDimensions
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
     * Set fileSize
     *
     * @param integer $fileSize
     * @return ResourceDimensions
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return integer 
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set resolution
     *
     * @param integer $resolution
     * @return ResourceDimensions
     */
    public function setResolution($resolution)
    {
        $this->resolution = $resolution;

        return $this;
    }

    /**
     * Get resolution
     *
     * @return integer 
     */
    public function getResolution()
    {
        return $this->resolution;
    }

    /**
     * Set unit
     *
     * @param string $unit
     * @return ResourceDimensions
     */
    public function setUnit($unit)
    {
        $this->unit = $unit;

        return $this;
    }

    /**
     * Get unit
     *
     * @return string 
     */
    public function getUnit()
    {
        return $this->unit;
    }

    /**
     * Set pageCount
     *
     * @param integer $pageCount
     * @return ResourceDimensions
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;

        return $this;
    }

    /**
     * Get pageCount
     *
     * @return integer 
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }
}
