<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;
use ZfcUser\Entity\UserInterface;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="session", columns={"session"})})
 * @ORM\Entity
 *
 * @Form\Name("user")
 */
class User implements UserInterface
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", length=11, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     *
     * @Form\Exclude()
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=50, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=50, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="fullname", type="string", length=100, nullable=true)
     */
    private $display_name;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="usergroup", type="integer", length=11, nullable=true)
     *
     * @Form\Type("Zend\Form\Element\Email")
     * @Form\Options({"label":"Email:"})
     */
    private $usergroup;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="last_active", type="datetime", nullable=true)
     *
     * @Form\Exclude()
     */
    private $lastActive = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="logged_in", type="integer", length=11, nullable=true)
     *
     * @Form\Exclude()
     */
    private $loggedIn;

    /**
     * @var string
     *
     * @ORM\Column(name="last_browser", type="text", nullable=true)
     *
     * @Form\Exclude()
     */
    private $lastBrowser;

    /**
     * @var string
     *
     * @ORM\Column(name="last_ip", type="string", length=100, nullable=true)
     *
     * @Form\Exclude()
     */
    private $lastIp;

    /**
     * @var integer
     *
     * @ORM\Column(name="current_collection", type="integer", length=11, nullable=true)
     *
     * @Form\Exclude()
     */
    private $currentCollection;

    /**
     * @var integer
     *
     * @ORM\Column(name="accepted_terms", type="integer", length=11, nullable=true)
     *
     * @Form\Exclude()
     */
    private $acceptedTerms = '0';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="account_expires", type="datetime", nullable=true)
     */
    private $accountExpires = null;

    /**
     * @var string
     *
     * @ORM\Column(name="comments", type="text", nullable=true)
     */
    private $comments;

    /**
     * @var string
     *
     * @ORM\Column(name="session", type="string", length=50, nullable=true)
     *
     * @Form\Exclude()
     */
    private $session;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_restrict", type="text", nullable=true)
     */
    private $ipRestrict;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="password_last_change", type="datetime", nullable=true)
     *
     * @Form\Exclude()
     */
    private $passwordLastChange = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_tries", type="integer", length=11, nullable=true)
     *
     * @Form\Exclude()
     */
    private $loginTries = '0';

    /**
     * @var DateTime
     *
     * @ORM\Column(name="login_last_try", type="datetime", nullable=true)
     *
     * @Form\Exclude()
     */
    private $loginLastTry = null;

    /**
     * @var integer
     *
     * @ORM\Column(name="approved", type="integer", length=11, nullable=true)
     *
     * @Form\Exclude()
     */
    private $state = true;

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=11, nullable=true)
     *
     * @Form\Exclude()
     */
    private $lang;

    /**
     * @var DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     *
     * @Form\Exclude()
     */
    private $created;

    /**
     * @var string
     *
     * @ORM\Column(name="hidden_collections", type="text", nullable=true)
     *
     * @Form\Exclude()
     */
    private $hiddenCollections;

    /**
     * Set defaults requiring complex objects
     */
    public function __construct() {
        $this->created = new \DateTime("now");
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
     * @param string $display_name
     * @return User
     */
    public function setDisplayName($display_name)
    {
        $this->display_name = $display_name;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string 
     */
    public function getDisplayName()
    {
        return $this->display_name;
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
     * @param integer $usergroup
     * @return User
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
     * Set lastActive
     *
     * @param DateTime $lastActive
     * @return User
     */
    public function setLastActive($lastActive)
    {
        $this->lastActive = $lastActive;

        return $this;
    }

    /**
     * Get lastActive
     *
     * @return DateTime
     */
    public function getLastActive()
    {
        return $this->lastActive;
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
     * @param integer $currentCollection
     * @return User
     */
    public function setCurrentCollection($currentCollection)
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
        $this->accountExpires = $accountExpires;

        return $this;
    }

    /**
     * Get accountExpires
     *
     * @return DateTime
     */
    public function getAccountExpires()
    {
        return $this->accountExpires;
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
    public function setPasswordLastChange($passwordLastChange)
    {
        $this->passwordLastChange = $passwordLastChange;

        return $this;
    }

    /**
     * Get passwordLastChange
     *
     * @return DateTime
     */
    public function getPasswordLastChange()
    {
        return $this->passwordLastChange;
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
    public function setLoginLastTry($loginLastTry)
    {
        $this->loginLastTry = $loginLastTry;

        return $this;
    }

    /**
     * Get loginLastTry
     *
     * @return DateTime
     */
    public function getLoginLastTry()
    {
        return $this->loginLastTry;
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
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return DateTime
     */
    public function getCreated()
    {
        return $this->created;
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

}
