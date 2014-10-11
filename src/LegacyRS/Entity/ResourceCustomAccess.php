<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResourceCustomAccess
 *
 * @ORM\Table(name="resource_custom_access", indexes={@ORM\Index(name="resource", columns={"resource"}), @ORM\Index(name="usergroup", columns={"usergroup"}), @ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class ResourceCustomAccess
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
     * @ORM\Column(name="usergroup", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $usergroup = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $user = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="access", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $access = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="user_expires", type="date", nullable=true)
     */
    private $userExpires;



    /**
     * Set resource
     *
     * @param integer $resource
     * @return ResourceCustomAccess
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
     * Set usergroup
     *
     * @param integer $usergroup
     * @return ResourceCustomAccess
     */
    public function setUsergroup($usergroup)
    {
        $this->usergroup = $usergroup;

        return $this;
    }

    /**
     * Get usergroup
     *
     * @return integer 
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }

    /**
     * Set user
     *
     * @param integer $user
     * @return ResourceCustomAccess
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
     * Set access
     *
     * @param integer $access
     * @return ResourceCustomAccess
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return integer 
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set userExpires
     *
     * @param \DateTime $userExpires
     * @return ResourceCustomAccess
     */
    public function setUserExpires($userExpires)
    {
        $this->userExpires = $userExpires;

        return $this;
    }

    /**
     * Get userExpires
     *
     * @return \DateTime 
     */
    public function getUserExpires()
    {
        return $this->userExpires;
    }
}
