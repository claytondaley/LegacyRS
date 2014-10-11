<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IpLockout
 *
 * @ORM\Table(name="ip_lockout")
 * @ORM\Entity
 */
class IpLockout
{
    /**
     * @var string
     *
     * @ORM\Column(name="ip", type="string", length=40, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $ip = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="tries", type="integer", nullable=true)
     */
    private $tries = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_try", type="datetime", nullable=true)
     */
    private $lastTry;



    /**
     * Get ip
     *
     * @return string 
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set tries
     *
     * @param integer $tries
     * @return IpLockout
     */
    public function setTries($tries)
    {
        $this->tries = $tries;

        return $this;
    }

    /**
     * Get tries
     *
     * @return integer 
     */
    public function getTries()
    {
        return $this->tries;
    }

    /**
     * Set lastTry
     *
     * @param \DateTime $lastTry
     * @return IpLockout
     */
    public function setLastTry($lastTry)
    {
        $this->lastTry = $lastTry;

        return $this;
    }

    /**
     * Get lastTry
     *
     * @return \DateTime 
     */
    public function getLastTry()
    {
        return $this->lastTry;
    }
}
