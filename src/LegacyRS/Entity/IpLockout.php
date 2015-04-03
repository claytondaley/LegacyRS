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
