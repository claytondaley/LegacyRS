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
 * ResearchRequest
 *
 * @ORM\Table(name="research_request", indexes={@ORM\Index(name="research_collections", columns={"collection"})})
 * @ORM\Entity
 */
class ResearchRequest
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
     * @ORM\Column(name="name", type="text", nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="deadline", type="datetime", nullable=true)
     */
    private $deadline;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=200, nullable=true)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="contact", type="string", length=100, nullable=true)
     */
    private $contact;

    /**
     * @var string
     *
     * @ORM\Column(name="finaluse", type="text", nullable=true)
     */
    private $finaluse;

    /**
     * @var string
     *
     * @ORM\Column(name="resource_types", type="string", length=50, nullable=true)
     */
    private $resourceTypes;

    /**
     * @var integer
     *
     * @ORM\Column(name="noresources", type="integer", nullable=true)
     */
    private $noresources;

    /**
     * @var string
     *
     * @ORM\Column(name="shape", type="string", length=50, nullable=true)
     */
    private $shape;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="assigned_to", type="integer", nullable=true)
     */
    private $assignedTo;

    /**
     * @var integer
     *
     * @ORM\Column(name="status", type="integer", nullable=true)
     */
    private $status = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="collection", type="integer", nullable=true)
     */
    private $collection;



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
     * @return ResearchRequest
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
     * Set description
     *
     * @param string $description
     * @return ResearchRequest
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set deadline
     *
     * @param \DateTime $deadline
     * @return ResearchRequest
     */
    public function setDeadline($deadline)
    {
        $this->deadline = $deadline;

        return $this;
    }

    /**
     * Get deadline
     *
     * @return \DateTime 
     */
    public function getDeadline()
    {
        return $this->deadline;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ResearchRequest
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set contact
     *
     * @param string $contact
     * @return ResearchRequest
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return string 
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * Set finaluse
     *
     * @param string $finaluse
     * @return ResearchRequest
     */
    public function setFinaluse($finaluse)
    {
        $this->finaluse = $finaluse;

        return $this;
    }

    /**
     * Get finaluse
     *
     * @return string 
     */
    public function getFinaluse()
    {
        return $this->finaluse;
    }

    /**
     * Set resourceTypes
     *
     * @param string $resourceTypes
     * @return ResearchRequest
     */
    public function setResourceTypes($resourceTypes)
    {
        $this->resourceTypes = $resourceTypes;

        return $this;
    }

    /**
     * Get resourceTypes
     *
     * @return string 
     */
    public function getResourceTypes()
    {
        return $this->resourceTypes;
    }

    /**
     * Set noresources
     *
     * @param integer $noresources
     * @return ResearchRequest
     */
    public function setNoresources($noresources)
    {
        $this->noresources = $noresources;

        return $this;
    }

    /**
     * Get noresources
     *
     * @return integer 
     */
    public function getNoresources()
    {
        return $this->noresources;
    }

    /**
     * Set shape
     *
     * @param string $shape
     * @return ResearchRequest
     */
    public function setShape($shape)
    {
        $this->shape = $shape;

        return $this;
    }

    /**
     * Get shape
     *
     * @return string 
     */
    public function getShape()
    {
        return $this->shape;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return ResearchRequest
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return ResearchRequest
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
     * Set assignedTo
     *
     * @param integer $assignedTo
     * @return ResearchRequest
     */
    public function setAssignedTo($assignedTo)
    {
        $this->assignedTo = $assignedTo;

        return $this;
    }

    /**
     * Get assignedTo
     *
     * @return integer 
     */
    public function getAssignedTo()
    {
        return $this->assignedTo;
    }

    /**
     * Set status
     *
     * @param integer $status
     * @return ResearchRequest
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return integer 
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set collection
     *
     * @param integer $collection
     * @return ResearchRequest
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return integer 
     */
    public function getCollection()
    {
        return $this->collection;
    }
}
