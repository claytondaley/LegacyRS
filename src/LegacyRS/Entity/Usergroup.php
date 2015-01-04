<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Usergroup
 *
 * @ORM\Table(name="usergroup")
 * @ORM\Entity
 */
class Usergroup
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
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="permissions", type="text", nullable=true)
     */
    private $permissions;

    /**
     * @var string
     *
     * @ORM\Column(name="fixed_theme", type="string", length=50, nullable=true)
     */
    private $fixedTheme;

    /**
     * @var string
     *
     * @ORM\Column(name="parent", type="string", length=50, nullable=true)
     */
    private $parent;

    /**
     * @var string
     *
     * @ORM\Column(name="search_filter", type="text", nullable=true)
     */
    private $searchFilter;

    /**
     * @var string
     *
     * @ORM\Column(name="edit_filter", type="text", nullable=true)
     */
    private $editFilter;

    /**
     * @var string
     *
     * @ORM\Column(name="derestrict_filter", type="text", nullable=true)
     */
    private $derestrictFilter;

    /**
     * @var string
     *
     * @ORM\Column(name="ip_restrict", type="text", nullable=true)
     */
    private $ipRestrict;

    /**
     * @var string
     *
     * @ORM\Column(name="resource_defaults", type="text", nullable=true)
     */
    private $resourceDefaults;

    /**
     * @var string
     *
     * @ORM\Column(name="config_options", type="text", nullable=true)
     */
    private $configOptions;

    /**
     * @var string
     *
     * @ORM\Column(name="welcome_message", type="text", nullable=true)
     */
    private $welcomeMessage;

    /**
     * @var integer
     *
     * @ORM\Column(name="request_mode", type="integer", nullable=true)
     */
    private $requestMode = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="allow_registration_selection", type="integer", nullable=true)
     */
    private $allowRegistrationSelection = '0';



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
     * @return Usergroup
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
     * Set permissions
     *
     * @param string $permissions
     * @return Usergroup
     */
    public function setPermissions($permissions)
    {
        $this->permissions = $permissions;

        return $this;
    }

    /**
     * Get permissions
     *
     * @return string 
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * Set fixedTheme
     *
     * @param string $fixedTheme
     * @return Usergroup
     */
    public function setFixedTheme($fixedTheme)
    {
        $this->fixedTheme = $fixedTheme;

        return $this;
    }

    /**
     * Get fixedTheme
     *
     * @return string 
     */
    public function getFixedTheme()
    {
        return $this->fixedTheme;
    }

    /**
     * Set parent
     *
     * @param string $parent
     * @return Usergroup
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return string 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set searchFilter
     *
     * @param string $searchFilter
     * @return Usergroup
     */
    public function setSearchFilter($searchFilter)
    {
        $this->searchFilter = $searchFilter;

        return $this;
    }

    /**
     * Get searchFilter
     *
     * @return string 
     */
    public function getSearchFilter()
    {
        return $this->searchFilter;
    }

    /**
     * Set editFilter
     *
     * @param string $editFilter
     * @return Usergroup
     */
    public function setEditFilter($editFilter)
    {
        $this->editFilter = $editFilter;

        return $this;
    }

    /**
     * Get editFilter
     *
     * @return string 
     */
    public function getEditFilter()
    {
        return $this->editFilter;
    }

    /**
     * Set derestrictFilter
     *
     * @param string $derestrictFilter
     * @return Usergroup
     */
    public function setDerestrictFilter($derestrictFilter)
    {
        $this->derestrictFilter = $derestrictFilter;

        return $this;
    }

    /**
     * Get derestrictFilter
     *
     * @return string 
     */
    public function getDerestrictFilter()
    {
        return $this->derestrictFilter;
    }

    /**
     * Set ipRestrict
     *
     * @param string $ipRestrict
     * @return Usergroup
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
     * Set resourceDefaults
     *
     * @param string $resourceDefaults
     * @return Usergroup
     */
    public function setResourceDefaults($resourceDefaults)
    {
        $this->resourceDefaults = $resourceDefaults;

        return $this;
    }

    /**
     * Get resourceDefaults
     *
     * @return string 
     */
    public function getResourceDefaults()
    {
        return $this->resourceDefaults;
    }

    /**
     * Set configOptions
     *
     * @param string $configOptions
     * @return Usergroup
     */
    public function setConfigOptions($configOptions)
    {
        $this->configOptions = $configOptions;

        return $this;
    }

    /**
     * Get configOptions
     *
     * @return string 
     */
    public function getConfigOptions()
    {
        return $this->configOptions;
    }

    /**
     * Set welcomeMessage
     *
     * @param string $welcomeMessage
     * @return Usergroup
     */
    public function setWelcomeMessage($welcomeMessage)
    {
        $this->welcomeMessage = $welcomeMessage;

        return $this;
    }

    /**
     * Get welcomeMessage
     *
     * @return string 
     */
    public function getWelcomeMessage()
    {
        return $this->welcomeMessage;
    }

    /**
     * Set requestMode
     *
     * @param integer $requestMode
     * @return Usergroup
     */
    public function setRequestMode($requestMode)
    {
        $this->requestMode = $requestMode;

        return $this;
    }

    /**
     * Get requestMode
     *
     * @return integer 
     */
    public function getRequestMode()
    {
        return $this->requestMode;
    }

    /**
     * Set allowRegistrationSelection
     *
     * @param integer $allowRegistrationSelection
     * @return Usergroup
     */
    public function setAllowRegistrationSelection($allowRegistrationSelection)
    {
        $this->allowRegistrationSelection = $allowRegistrationSelection;

        return $this;
    }

    /**
     * Get allowRegistrationSelection
     *
     * @return integer 
     */
    public function getAllowRegistrationSelection()
    {
        return $this->allowRegistrationSelection;
    }
}