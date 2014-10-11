<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserUserlist
 *
 * @ORM\Table(name="user_userlist")
 * @ORM\Entity
 */
class UserUserlist
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
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var string
     *
     * @ORM\Column(name="userlist_name", type="string", length=50, nullable=true)
     */
    private $userlistName;

    /**
     * @var string
     *
     * @ORM\Column(name="userlist_string", type="text", nullable=true)
     */
    private $userlistString;



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
     * Set user
     *
     * @param integer $user
     * @return UserUserlist
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
     * Set userlistName
     *
     * @param string $userlistName
     * @return UserUserlist
     */
    public function setUserlistName($userlistName)
    {
        $this->userlistName = $userlistName;

        return $this;
    }

    /**
     * Get userlistName
     *
     * @return string 
     */
    public function getUserlistName()
    {
        return $this->userlistName;
    }

    /**
     * Set userlistString
     *
     * @param string $userlistString
     * @return UserUserlist
     */
    public function setUserlistString($userlistString)
    {
        $this->userlistString = $userlistString;

        return $this;
    }

    /**
     * Get userlistString
     *
     * @return string 
     */
    public function getUserlistString()
    {
        return $this->userlistString;
    }
}
