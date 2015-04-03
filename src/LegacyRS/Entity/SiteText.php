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
 * SiteText
 *
 * @ORM\Table(name="site_text")
 * @ORM\Entity
 */
class SiteText
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
     * @ORM\Column(name="page", type="string", length=50, nullable=true)
     */
    private $page;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="text", nullable=true)
     */
    private $text;

    /**
     * @var string
     *
     * @ORM\Column(name="language", type="string", length=10, nullable=true)
     */
    private $language;

    /**
     * @var integer
     *
     * @ORM\Column(name="ignore_me", type="integer", nullable=true)
     */
    private $ignoreMe;

    /**
     * @var integer
     *
     * @ORM\Column(name="specific_to_group", type="integer", nullable=true)
     */
    private $specificToGroup;

    /**
     * @var integer
     *
     * @ORM\Column(name="custom", type="integer", nullable=true)
     */
    private $custom;



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
     * Set page
     *
     * @param string $page
     * @return SiteText
     */
    public function setPage($page)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page
     *
     * @return string 
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return SiteText
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
     * Set text
     *
     * @param string $text
     * @return SiteText
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string 
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return SiteText
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set ignoreMe
     *
     * @param integer $ignoreMe
     * @return SiteText
     */
    public function setIgnoreMe($ignoreMe)
    {
        $this->ignoreMe = $ignoreMe;

        return $this;
    }

    /**
     * Get ignoreMe
     *
     * @return integer 
     */
    public function getIgnoreMe()
    {
        return $this->ignoreMe;
    }

    /**
     * Set specificToGroup
     *
     * @param integer $specificToGroup
     * @return SiteText
     */
    public function setSpecificToGroup($specificToGroup)
    {
        $this->specificToGroup = $specificToGroup;

        return $this;
    }

    /**
     * Get specificToGroup
     *
     * @return integer 
     */
    public function getSpecificToGroup()
    {
        return $this->specificToGroup;
    }

    /**
     * Set custom
     *
     * @param integer $custom
     * @return SiteText
     */
    public function setCustom($custom)
    {
        $this->custom = $custom;

        return $this;
    }

    /**
     * Get custom
     *
     * @return integer 
     */
    public function getCustom()
    {
        return $this->custom;
    }
}
