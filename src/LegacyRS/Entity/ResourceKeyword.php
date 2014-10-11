<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceKeyword
 *
 * @ORM\Table(name="resource_keyword", indexes={@ORM\Index(name="resource_keyword", columns={"resource", "keyword"}), @ORM\Index(name="resource", columns={"resource"}), @ORM\Index(name="keyword", columns={"keyword"}), @ORM\Index(name="resource_type_field", columns={"resource_type_field"}), @ORM\Index(name="rk_all", columns={"resource", "keyword", "resource_type_field"})})
 * @ORM\Entity
 */
class ResourceKeyword
{
    /**
     * @var integer
     *
     * @ORM\Column(name="resource", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $resource = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="keyword", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $keyword = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="position", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $position = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="resource_type_field", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $resourceTypeField = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="hit_count", type="integer", nullable=true)
     */
    private $hitCount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="new_hit_count", type="integer", nullable=true)
     */
    private $newHitCount = '0';



    /**
     * Set resource
     *
     * @param integer $resource
     * @return ResourceKeyword
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

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
     * Set keyword
     *
     * @param integer $keyword
     * @return ResourceKeyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return integer 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set position
     *
     * @param integer $position
     * @return ResourceKeyword
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return integer 
     */
    public function getPosition()
    {
        return $this->position;
    }

    /**
     * Set resourceTypeField
     *
     * @param integer $resourceTypeField
     * @return ResourceKeyword
     */
    public function setResourceTypeField($resourceTypeField)
    {
        $this->resourceTypeField = $resourceTypeField;

        return $this;
    }

    /**
     * Get resourceTypeField
     *
     * @return integer 
     */
    public function getResourceTypeField()
    {
        return $this->resourceTypeField;
    }

    /**
     * Set hitCount
     *
     * @param integer $hitCount
     * @return ResourceKeyword
     */
    public function setHitCount($hitCount)
    {
        $this->hitCount = $hitCount;

        return $this;
    }

    /**
     * Get hitCount
     *
     * @return integer 
     */
    public function getHitCount()
    {
        return $this->hitCount;
    }

    /**
     * Set newHitCount
     *
     * @param integer $newHitCount
     * @return ResourceKeyword
     */
    public function setNewHitCount($newHitCount)
    {
        $this->newHitCount = $newHitCount;

        return $this;
    }

    /**
     * Get newHitCount
     *
     * @return integer 
     */
    public function getNewHitCount()
    {
        return $this->newHitCount;
    }
}
