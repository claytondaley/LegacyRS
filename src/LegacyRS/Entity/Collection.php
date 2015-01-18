<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collection
 *
 * @ORM\Table(name="collection", indexes={@ORM\Index(name="theme", columns={"theme"}), @ORM\Index(name="public", columns={"public"}), @ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class Collection
{
    /**
     * @var integer
     *
     * @ORM\Id
     * @ORM\Column(name="ref", type="integer", length=11, nullable=false)
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    private $created;

    /**
     * @var integer
     *
     * @ORM\Column(name="public", type="integer", nullable=true)
     */
    private $public = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="theme", type="string", length=100, nullable=true)
     */
    private $theme;

    /**
     * @var string
     *
     * @ORM\Column(name="theme2", type="string", length=100, nullable=true)
     */
    private $theme2;

    /**
     * @var string
     *
     * @ORM\Column(name="theme3", type="string", length=100, nullable=true)
     */
    private $theme3;

    /**
     * @var integer
     *
     * @ORM\Column(name="allow_changes", type="integer", nullable=true)
     */
    private $allowChanges = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="cant_delete", type="integer", nullable=true)
     */
    private $cantDelete = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="keywords", type="text", nullable=true)
     */
    private $keywords;

    /**
     * @var integer
     *
     * @ORM\Column(name="savedsearch", type="integer", nullable=true)
     */
    private $savedsearch;

    /**
     * @var integer
     *
     * @ORM\Column(name="home_page_publish", type="integer", nullable=true)
     */
    private $homePagePublish;

    /**
     * @var string
     *
     * @ORM\Column(name="home_page_text", type="text", nullable=true)
     */
    private $homePageText;

    /**
     * @var integer
     *
     * @ORM\Column(name="home_page_image", type="integer", nullable=true)
     */
    private $homePageImage;



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
     * Set name
     *
     * @param string $name
     * @return Collection
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
     * Set user
     *
     * @param integer $user
     * @return Collection
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
     * Set created
     *
     * @param \DateTime $created
     * @return Collection
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
     * Set public
     *
     * @param integer $public
     * @return Collection
     */
    public function setPublic($public)
    {
        $this->public = $public;

        return $this;
    }

    /**
     * Get public
     *
     * @return integer 
     */
    public function getPublic()
    {
        return $this->public;
    }

    /**
     * Set theme
     *
     * @param string $theme
     * @return Collection
     */
    public function setTheme($theme)
    {
        $this->theme = $theme;

        return $this;
    }

    /**
     * Get theme
     *
     * @return string 
     */
    public function getTheme()
    {
        return $this->theme;
    }

    /**
     * Set theme2
     *
     * @param string $theme2
     * @return Collection
     */
    public function setTheme2($theme2)
    {
        $this->theme2 = $theme2;

        return $this;
    }

    /**
     * Get theme2
     *
     * @return string 
     */
    public function getTheme2()
    {
        return $this->theme2;
    }

    /**
     * Set theme3
     *
     * @param string $theme3
     * @return Collection
     */
    public function setTheme3($theme3)
    {
        $this->theme3 = $theme3;

        return $this;
    }

    /**
     * Get theme3
     *
     * @return string 
     */
    public function getTheme3()
    {
        return $this->theme3;
    }

    /**
     * Set allowChanges
     *
     * @param integer $allowChanges
     * @return Collection
     */
    public function setAllowChanges($allowChanges)
    {
        $this->allowChanges = $allowChanges;

        return $this;
    }

    /**
     * Get allowChanges
     *
     * @return integer 
     */
    public function getAllowChanges()
    {
        return $this->allowChanges;
    }

    /**
     * Set cantDelete
     *
     * @param integer $cantDelete
     * @return Collection
     */
    public function setCantDelete($cantDelete)
    {
        $this->cantDelete = $cantDelete;

        return $this;
    }

    /**
     * Get cantDelete
     *
     * @return integer 
     */
    public function getCantDelete()
    {
        return $this->cantDelete;
    }

    /**
     * Set keywords
     *
     * @param string $keywords
     * @return Collection
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;

        return $this;
    }

    /**
     * Get keywords
     *
     * @return string 
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * Set savedsearch
     *
     * @param integer $savedsearch
     * @return Collection
     */
    public function setSavedsearch($savedsearch)
    {
        $this->savedsearch = $savedsearch;

        return $this;
    }

    /**
     * Get savedsearch
     *
     * @return integer 
     */
    public function getSavedsearch()
    {
        return $this->savedsearch;
    }

    /**
     * Set homePagePublish
     *
     * @param integer $homePagePublish
     * @return Collection
     */
    public function setHomePagePublish($homePagePublish)
    {
        $this->homePagePublish = $homePagePublish;

        return $this;
    }

    /**
     * Get homePagePublish
     *
     * @return integer 
     */
    public function getHomePagePublish()
    {
        return $this->homePagePublish;
    }

    /**
     * Set homePageText
     *
     * @param string $homePageText
     * @return Collection
     */
    public function setHomePageText($homePageText)
    {
        $this->homePageText = $homePageText;

        return $this;
    }

    /**
     * Get homePageText
     *
     * @return string 
     */
    public function getHomePageText()
    {
        return $this->homePageText;
    }

    /**
     * Set homePageImage
     *
     * @param integer $homePageImage
     * @return Collection
     */
    public function setHomePageImage($homePageImage)
    {
        $this->homePageImage = $homePageImage;

        return $this;
    }

    /**
     * Get homePageImage
     *
     * @return integer 
     */
    public function getHomePageImage()
    {
        return $this->homePageImage;
    }
}
