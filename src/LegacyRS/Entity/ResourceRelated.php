<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceRelated
 *
 * @ORM\Table(name="resource_related", indexes={@ORM\Index(name="resource_related", columns={"resource"}), @ORM\Index(name="related", columns={"related"})})
 * @ORM\Entity
 */
class ResourceRelated
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
     * @ORM\Column(name="related", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $related = '0';



    /**
     * Set resource
     *
     * @param integer $resource
     * @return ResourceRelated
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
     * Set related
     *
     * @param integer $related
     * @return ResourceRelated
     */
    public function setRelated($related)
    {
        $this->related = $related;

        return $this;
    }

    /**
     * Get related
     *
     * @return integer 
     */
    public function getRelated()
    {
        return $this->related;
    }
}
