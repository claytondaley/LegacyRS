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

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;
use ZfcRbac\Identity\IdentityInterface;
use ZfcUser\Entity\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="session", columns={"session"})})
 * @ORM\Entity
 */
class User
    implements UserInterface, IdentityInterface
{
    static $stateNames = array('Disabled', 'Enabled');

    /**
     * @ORM\Id
     * @ORM\Column(name="ref", type="integer", length=11, nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @ORM\Column(name="username", type="string", length=50, nullable=true)
     */
    protected $username;

    /**
     * @ORM\Column(name="password", type="string", length=128, nullable=false)
     */
    protected $password;

    /**
     * @ORM\Column(name="fullname", type="string", length=100, nullable=true)
     */
    protected $displayName;

    /**
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    protected $email;

    /**
     * @ORM\ManyToOne(targetEntity="Usergroup")
     * @ORM\JoinColumn(name="usergroup", referencedColumnName="ref")
     */
    private $usergroup;

    /**
     * @ORM\Column(name="last_active", type="datetime", nullable=true)
     */
    private $lastActive = null;

    /**
     * @ORM\Column(name="logged_in", type="integer", length=11, nullable=true)
     */
    private $loggedIn;

    /**
     * @ORM\Column(name="last_browser", type="text", nullable=true)
     */
    private $lastBrowser;

    /**
     * @ORM\Column(name="last_ip", type="string", length=100, nullable=true)
     */
    private $lastIp;

    /**
     * @ORM\ManyToOne(targetEntity="Collection")
     * @ORM\JoinColumn(name="current_collection", referencedColumnName="ref", nullable=true)
     */
    private $currentCollection;

    /**
     * @ORM\Column(name="accepted_terms", type="integer", length=11, nullable=true)
     */
    private $acceptedTerms = '0';

    /**
     * @ORM\Column(name="account_expires", type="datetime", nullable=true)
     */
    private $accountExpires = null;

    /**
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @ORM\Column(name="session", type="string", length=50, nullable=true)
     */
    private $session;

    /**
     * @ORM\Column(name="ip_restrict", type="text", nullable=true)
     */
    private $ipRestrict;

    /**
     * @ORM\Column(name="password_last_change", type="datetime", nullable=true)
     */
    private $passwordLastChange = null;

    /**
     * @ORM\Column(name="login_tries", type="integer", length=11, nullable=true)
     */
    private $loginTries = '0';

    /**
     * @ORM\Column(name="login_last_try", type="datetime", nullable=true)
     */
    private $loginLastTry = null;

    /**
     * @ORM\Column(name="approved", type="integer", length=11, nullable=true)
     */
    protected $state = true;

    /**
     * @ORM\Column(name="lang", type="string", length=11, nullable=true)
     */
    private $lang;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created;

    /**
     * @ORM\Column(name="hidden_collections", type="text", nullable=true)
     */
    private $hiddenCollections;

    /**
     * Set defaults requiring complex objects
     */
    public function __construct() {
        $this->created = new DateTime("now");
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set id.
     *
     * @param int $id
     * @return UserInterface
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set fullname
     *
     * @param string $displayName
     * @return User
     */
    public function setDisplayName($displayName)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
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
     * Set usergroup
     *
     * @param Usergroup $usergroup
     * @return User
     */
    public function setUsergroup(Usergroup $usergroup)
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
     * Set lastActive
     *
     * @param DateTime $lastActive
     * @return User
     */
    public function setLastActive(DateTime $lastActive)
    {
        $this->lastActive = $lastActive ? clone $lastActive : null;

        return $this;
    }

    /**
     * Get lastActive
     *
     * @return DateTime
     */
    public function getLastActive()
    {
        return $this->lastActive ? clone $this->lastActive : null;
    }

    /**
     * Set loggedIn
     *
     * @param integer $loggedIn
     * @return User
     */
    public function setLoggedIn($loggedIn)
    {
        $this->loggedIn = $loggedIn;

        return $this;
    }

    /**
     * Get loggedIn
     *
     * @return integer
     */
    public function getLoggedIn()
    {
        return $this->loggedIn;
    }

    /**
     * Set lastBrowser
     *
     * @param string $lastBrowser
     * @return User
     */
    public function setLastBrowser($lastBrowser)
    {
        $this->lastBrowser = $lastBrowser;

        return $this;
    }

    /**
     * Get lastBrowser
     *
     * @return string
     */
    public function getLastBrowser()
    {
        return $this->lastBrowser;
    }

    /**
     * Set lastIp
     *
     * @param string $lastIp
     * @return User
     */
    public function setLastIp($lastIp)
    {
        $this->lastIp = $lastIp;

        return $this;
    }

    /**
     * Get lastIp
     *
     * @return string
     */
    public function getLastIp()
    {
        return $this->lastIp;
    }

    /**
     * Set currentCollection
     *
     * @param Collection $currentCollection
     * @return User
     */
    public function setCurrentCollection(Collection $currentCollection)
    {
        $this->currentCollection = $currentCollection;

        return $this;
    }

    /**
     * Get currentCollection
     *
     * @return integer
     */
    public function getCurrentCollection()
    {
        return $this->currentCollection;
    }

    /**
     * Set acceptedTerms
     *
     * @param integer $acceptedTerms
     * @return User
     */
    public function setAcceptedTerms($acceptedTerms)
    {
        $this->acceptedTerms = $acceptedTerms;

        return $this;
    }

    /**
     * Get acceptedTerms
     *
     * @return integer
     */
    public function getAcceptedTerms()
    {
        return $this->acceptedTerms;
    }

    /**
     * Set accountExpires
     *
     * @param DateTime $accountExpires
     * @return User
     */
    public function setAccountExpires($accountExpires)
    {
        $this->accountExpires = clone $accountExpires;

        return $this;
    }

    /**
     * Get accountExpires
     *
     * @return DateTime
     */
    public function getAccountExpires()
    {
        return $this->accountExpires ? clone $this->accountExpires : null;
    }

    /**
     * Set comments
     *
     * @param string $comments
     * @return User
     */
    public function setComments($comments)
    {
        $this->comments = $comments;

        return $this;
    }

    /**
     * Get comments
     *
     * @return string
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set session
     *
     * @param string $session
     * @return User
     */
    public function setSession($session)
    {
        $this->session = $session;

        return $this;
    }

    /**
     * Get session
     *
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Set ipRestrict
     *
     * @param string $ipRestrict
     * @return User
     */
    public function setIpRestrict($ipRestrict)
    {
        $this->ipRestrict = $ipRestrict;

        return $this;
    }

    /**
     * Get ipRestrict
     *
     * @return string
     */
    public function getIpRestrict()
    {
        return $this->ipRestrict;
    }

    /**
     * Set passwordLastChange
     *
     * @param DateTime $passwordLastChange
     * @return User
     */
    public function setPasswordLastChange(DateTime $passwordLastChange)
    {
        $this->passwordLastChange = $passwordLastChange ? clone $passwordLastChange : null;

        return $this;
    }

    /**
     * Get passwordLastChange
     *
     * @return DateTime
     */
    public function getPasswordLastChange()
    {
        return $this->passwordLastChange ? clone $this->passwordLastChange : null;
    }

    /**
     * Set loginTries
     *
     * @param integer $loginTries
     * @return User
     */
    public function setLoginTries($loginTries)
    {
        $this->loginTries = $loginTries;

        return $this;
    }

    /**
     * Get loginTries
     *
     * @return integer
     */
    public function getLoginTries()
    {
        return $this->loginTries;
    }

    /**
     * Set loginLastTry
     *
     * @param DateTime $loginLastTry
     * @return User
     */
    public function setLoginLastTry(DateTime $loginLastTry)
    {
        $this->loginLastTry = $loginLastTry ? clone $loginLastTry : null;

        return $this;
    }

    /**
     * Get loginLastTry
     *
     * @return DateTime
     */
    public function getLoginLastTry()
    {
        return $this->loginLastTry ? clone $this->loginLastTry : null;
    }

    /**
     * Set approved
     *
     * @param integer $state
     * @return User
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get approved
     *
     * @return integer
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set lang
     *
     * @param string $lang
     * @return User
     */
    public function setLang($lang)
    {
        $this->lang = $lang;

        return $this;
    }

    /**
     * Get lang
     *
     * @return string
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * Set created
     *
     * @param DateTime $created
     * @return User
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created ? clone $created : null;

        return $this;
    }

    /**
     * Get created
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created ? clone $this->created : null;
    }

    /**
     * Set hiddenCollections
     *
     * @param string $hiddenCollections
     * @return User
     */
    public function setHiddenCollections($hiddenCollections)
    {
        $this->hiddenCollections = $hiddenCollections;

        return $this;
    }

    /**
     * Get hiddenCollections
     *
     * @return string
     */
    public function getHiddenCollections()
    {
        return $this->hiddenCollections;
    }

    /**
     * Get the list of roles of this identity
     *
     * @return string[]|\Rbac\Role\RoleInterface[]
     */
    public function getRoles()
    {
        return array($this->getUsergroup());
    }
}
