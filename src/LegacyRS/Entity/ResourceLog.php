<?php
/**
 * Copyright (C) 2014-2015 Clayton Daley III
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceLog
 *
 * @ORM\Table(name="resource_log", indexes={@ORM\Index(name="resource", columns={"resource"}), @ORM\Index(name="type", columns={"type"})})
 * @ORM\Entity
 */
class ResourceLog
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="resource", type="integer", nullable=true)
     */
    private $resource;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=1, nullable=true)
     */
    private $type;

    /**
     * @var integer
     *
     * @ORM\Column(name="resource_type_field", type="integer", nullable=true)
     */
    private $resourceTypeField;

    /**
     * @var string
     *
     * @ORM\Column(name="notes", type="text", nullable=true)
     */
    private $notes;

    /**
     * @var string
     *
     * @ORM\Column(name="diff", type="text", nullable=true)
     */
    private $diff;

    /**
     * @var integer
     *
     * @ORM\Column(name="usageoption", type="integer", nullable=true)
     */
    private $usageoption;

    /**
     * @var string
     *
     * @ORM\Column(name="purchase_size", type="string", length=10, nullable=true)
     */
    private $purchaseSize;

    /**
     * @var string
     *
     * @ORM\Column(name="purchase_price", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $purchasePrice = '0.00';

    /**
     * @var string
     *
     * @ORM\Column(name="access_key", type="string", length=50, nullable=true)
     */
    private $accessKey;

    /**
     * @var string
     *
     * @ORM\Column(name="previous_value", type="text", nullable=true)
     */
    private $previousValue;



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
     * Set date
     *
     * @param \DateTime $date
     * @return ResourceLog
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return ResourceLog
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return integer 
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set resource
     *
     * @param integer $resource
     * @return ResourceLog
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
     * Set type
     *
     * @param string $type
     * @return ResourceLog
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set resourceTypeField
     *
     * @param integer $resourceTypeField
     * @return ResourceLog
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
     * Set notes
     *
     * @param string $notes
     * @return ResourceLog
     */
    public function setNotes($notes)
    {
        $this->notes = $notes;

        return $this;
    }

    /**
     * Get notes
     *
     * @return string 
     */
    public function getNotes()
    {
        return $this->notes;
    }

    /**
     * Set diff
     *
     * @param string $diff
     * @return ResourceLog
     */
    public function setDiff($diff)
    {
        $this->diff = $diff;

        return $this;
    }

    /**
     * Get diff
     *
     * @return string 
     */
    public function getDiff()
    {
        return $this->diff;
    }

    /**
     * Set usageoption
     *
     * @param integer $usageoption
     * @return ResourceLog
     */
    public function setUsageoption($usageoption)
    {
        $this->usageoption = $usageoption;

        return $this;
    }

    /**
     * Get usageoption
     *
     * @return integer 
     */
    public function getUsageoption()
    {
        return $this->usageoption;
    }

    /**
     * Set purchaseSize
     *
     * @param string $purchaseSize
     * @return ResourceLog
     */
    public function setPurchaseSize($purchaseSize)
    {
        $this->purchaseSize = $purchaseSize;

        return $this;
    }

    /**
     * Get purchaseSize
     *
     * @return string 
     */
    public function getPurchaseSize()
    {
        return $this->purchaseSize;
    }

    /**
     * Set purchasePrice
     *
     * @param string $purchasePrice
     * @return ResourceLog
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    /**
     * Get purchasePrice
     *
     * @return string 
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * Set accessKey
     *
     * @param string $accessKey
     * @return ResourceLog
     */
    public function setAccessKey($accessKey)
    {
        $this->accessKey = $accessKey;

        return $this;
    }

    /**
     * Get accessKey
     *
     * @return string 
     */
    public function getAccessKey()
    {
        return $this->accessKey;
    }

    /**
     * Set previousValue
     *
     * @param string $previousValue
     * @return ResourceLog
     */
    public function setPreviousValue($previousValue)
    {
        $this->previousValue = $previousValue;

        return $this;
    }

    /**
     * Get previousValue
     *
     * @return string 
     */
    public function getPreviousValue()
    {
        return $this->previousValue;
    }
}
