<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceType
 *
 * @ORM\Table(name="resource_type")
 * @ORM\Entity
 */
class ResourceType
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
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="allowed_extensions", type="text", nullable=true)
     */
    private $allowedExtensions;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_by", type="integer", nullable=true)
     */
    private $orderBy;

    /**
     * @var string
     *
     * @ORM\Column(name="config_options", type="text", nullable=true)
     */
    private $configOptions;



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
     * Set name
     *
     * @param string $name
     * @return ResourceType
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
     * Set allowedExtensions
     *
     * @param string $allowedExtensions
     * @return ResourceType
     */
    public function setAllowedExtensions($allowedExtensions)
    {
        $this->allowedExtensions = $allowedExtensions;

        return $this;
    }

    /**
     * Get allowedExtensions
     *
     * @return string 
     */
    public function getAllowedExtensions()
    {
        return $this->allowedExtensions;
    }

    /**
     * Set orderBy
     *
     * @param integer $orderBy
     * @return ResourceType
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * Get orderBy
     *
     * @return integer 
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Set configOptions
     *
     * @param string $configOptions
     * @return ResourceType
     */
    public function setConfigOptions($configOptions)
    {
        $this->configOptions = $configOptions;

        return $this;
    }

    /**
     * Get configOptions
     *
     * @return string 
     */
    public function getConfigOptions()
    {
        return $this->configOptions;
    }
}
