<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ExternalAccessKeys
 *
 * @ORM\Table(name="external_access_keys", indexes={@ORM\Index(name="resource", columns={"resource"}), @ORM\Index(name="resource_key", columns={"resource", "access_key"})})
 * @ORM\Entity
 */
class ExternalAccessKeys
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
     * @var string
     *
     * @ORM\Column(name="access_key", type="string", length=10, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $accessKey = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="collection", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $collection = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="request_feedback", type="integer", nullable=true)
     */
    private $requestFeedback = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime", nullable=true)
     */
    private $date;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="lastused", type="datetime", nullable=true)
     */
    private $lastused;

    /**
     * @var integer
     *
     * @ORM\Column(name="access", type="integer", nullable=true)
     */
    private $access = '-1';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="expires", type="datetime", nullable=true)
     */
    private $expires;



    /**
     * Set resource
     *
     * @param integer $resource
     * @return ExternalAccessKeys
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
     * Set accessKey
     *
     * @param string $accessKey
     * @return ExternalAccessKeys
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
     * Set collection
     *
     * @param integer $collection
     * @return ExternalAccessKeys
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

    /**
     * Set user
     *
     * @param integer $user
     * @return ExternalAccessKeys
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
     * Set requestFeedback
     *
     * @param integer $requestFeedback
     * @return ExternalAccessKeys
     */
    public function setRequestFeedback($requestFeedback)
    {
        $this->requestFeedback = $requestFeedback;

        return $this;
    }

    /**
     * Get requestFeedback
     *
     * @return integer 
     */
    public function getRequestFeedback()
    {
        return $this->requestFeedback;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return ExternalAccessKeys
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
     * Set date
     *
     * @param \DateTime $date
     * @return ExternalAccessKeys
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
     * Set lastused
     *
     * @param \DateTime $lastused
     * @return ExternalAccessKeys
     */
    public function setLastused($lastused)
    {
        $this->lastused = $lastused;

        return $this;
    }

    /**
     * Get lastused
     *
     * @return \DateTime 
     */
    public function getLastused()
    {
        return $this->lastused;
    }

    /**
     * Set access
     *
     * @param integer $access
     * @return ExternalAccessKeys
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
     * Set expires
     *
     * @param \DateTime $expires
     * @return ExternalAccessKeys
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * Get expires
     *
     * @return \DateTime 
     */
    public function getExpires()
    {
        return $this->expires;
    }
}
