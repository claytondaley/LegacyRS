<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;
use Zend\Form\Annotation as Form;

/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="session", columns={"session"})})
 * @ORM\Entity
 *
 * @Form\Name("user")
 */
class User
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
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
    private $fullname;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=true)
     */
    private $email;

    /**
     * @var integer
     *
     * @ORM\Column(name="usergroup", type="integer", nullable=true)
     *
     * @Form\Type("Zend\Form\Element\Email")
     * @Form\Options({"label":"Email:"})
     */
    private $usergroup;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_active", type="datetime", nullable=true)
     *
     * @Form\Exclude()
     */
    private $lastActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="logged_in", type="integer", nullable=true)
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
     * @ORM\Column(name="current_collection", type="integer", nullable=true)
     *
     * @Form\Exclude()
     */
    private $currentCollection;

    /**
     * @var integer
     *
     * @ORM\Column(name="accepted_terms", type="integer", nullable=true)
     *
     * @Form\Exclude()
     */
    private $acceptedTerms = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="account_expires", type="datetime", nullable=true)
     */
    private $accountExpires;

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
     * @var \DateTime
     *
     * @ORM\Column(name="password_last_change", type="datetime", nullable=true)
     *
     * @Form\Exclude()
     */
    private $passwordLastChange;

    /**
     * @var integer
     *
     * @ORM\Column(name="login_tries", type="integer", nullable=true)
     *
     * @Form\Exclude()
     */
    private $loginTries = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="login_last_try", type="datetime", nullable=true)
     *
     * @Form\Exclude()
     */
    private $loginLastTry;

    /**
     * @var integer
     *
     * @ORM\Column(name="approved", type="integer", nullable=true)
     *
     * @Form\Exclude()
     */
    private $approved = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="lang", type="string", length=11, nullable=true)
     *
     * @Form\Exclude()
     */
    private $lang;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     *
     * @Form\Exclude()
     */
    private $created = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="hidden_collections", type="text", nullable=true)
     *
     * @Form\Exclude()
     */
    private $hiddenCollections;



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
     * @param string $fullname
     * @return User
     */
    public function setFullname($fullname)
    {
        $this->fullname = $fullname;

        return $this;
    }

    /**
     * Get fullname
     *
     * @return string 
     */
    public function getFullname()
    {
        return $this->fullname;
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
     * @param \DateTime $lastActive
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
     * @return \DateTime 
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
     * @param \DateTime $accountExpires
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
     * @return \DateTime 
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
     * @param \DateTime $passwordLastChange
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
     * @return \DateTime 
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
     * @param \DateTime $loginLastTry
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
     * @return \DateTime 
     */
    public function getLoginLastTry()
    {
        return $this->loginLastTry;
    }

    /**
     * Set approved
     *
     * @param integer $approved
     * @return User
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return integer 
     */
    public function getApproved()
    {
        return $this->approved;
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
     * @param \DateTime $created
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
     * @return \DateTime 
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
