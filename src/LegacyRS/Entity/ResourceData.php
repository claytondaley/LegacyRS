<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceData
 *
 * @ORM\Table(name="resource_data", indexes={@ORM\Index(name="resource", columns={"resource"})})
 * @ORM\Entity
 */
class ResourceData
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
     * @ORM\Column(name="resource_type_field", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $resourceTypeField = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="text", nullable=true)
     */
    private $value;



    /**
     * Set resource
     *
     * @param integer $resource
     * @return ResourceData
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
     * Set resourceTypeField
     *
     * @param integer $resourceTypeField
     * @return ResourceData
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
     * Set value
     *
     * @param string $value
     * @return ResourceData
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }
}
