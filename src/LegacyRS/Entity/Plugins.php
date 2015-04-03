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
 * Plugins
 *
 * @ORM\Table(name="plugins")
 * @ORM\Entity
 */
class Plugins
{
    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=20, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $name = '';

    /**
     * @var string
     *
     * @ORM\Column(name="descrip", type="text", nullable=true)
     */
    private $descrip;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=100, nullable=true)
     */
    private $author;

    /**
     * @var string
     *
     * @ORM\Column(name="update_url", type="string", length=100, nullable=true)
     */
    private $updateUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="info_url", type="string", length=100, nullable=true)
     */
    private $infoUrl;

    /**
     * @var float
     *
     * @ORM\Column(name="inst_version", type="float", precision=10, scale=0, nullable=true)
     */
    private $instVersion;

    /**
     * @var string
     *
     * @ORM\Column(name="config", type="blob", nullable=true)
     */
    private $config;

    /**
     * @var string
     *
     * @ORM\Column(name="config_json", type="text", nullable=true)
     */
    private $configJson;

    /**
     * @var string
     *
     * @ORM\Column(name="config_url", type="string", length=100, nullable=true)
     */
    private $configUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="enabled_groups", type="string", length=200, nullable=true)
     */
    private $enabledGroups;

    /**
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=true)
     */
    private $priority = '999';



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
     * Set descrip
     *
     * @param string $descrip
     * @return Plugins
     */
    public function setDescrip($descrip)
    {
        $this->descrip = $descrip;

        return $this;
    }

    /**
     * Get descrip
     *
     * @return string 
     */
    public function getDescrip()
    {
        return $this->descrip;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Plugins
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set updateUrl
     *
     * @param string $updateUrl
     * @return Plugins
     */
    public function setUpdateUrl($updateUrl)
    {
        $this->updateUrl = $updateUrl;

        return $this;
    }

    /**
     * Get updateUrl
     *
     * @return string 
     */
    public function getUpdateUrl()
    {
        return $this->updateUrl;
    }

    /**
     * Set infoUrl
     *
     * @param string $infoUrl
     * @return Plugins
     */
    public function setInfoUrl($infoUrl)
    {
        $this->infoUrl = $infoUrl;

        return $this;
    }

    /**
     * Get infoUrl
     *
     * @return string 
     */
    public function getInfoUrl()
    {
        return $this->infoUrl;
    }

    /**
     * Set instVersion
     *
     * @param float $instVersion
     * @return Plugins
     */
    public function setInstVersion($instVersion)
    {
        $this->instVersion = $instVersion;

        return $this;
    }

    /**
     * Get instVersion
     *
     * @return float 
     */
    public function getInstVersion()
    {
        return $this->instVersion;
    }

    /**
     * Set config
     *
     * @param string $config
     * @return Plugins
     */
    public function setConfig($config)
    {
        $this->config = $config;

        return $this;
    }

    /**
     * Get config
     *
     * @return string 
     */
    public function getConfig()
    {
        return $this->config;
    }

    /**
     * Set configJson
     *
     * @param string $configJson
     * @return Plugins
     */
    public function setConfigJson($configJson)
    {
        $this->configJson = $configJson;

        return $this;
    }

    /**
     * Get configJson
     *
     * @return string 
     */
    public function getConfigJson()
    {
        return $this->configJson;
    }

    /**
     * Set configUrl
     *
     * @param string $configUrl
     * @return Plugins
     */
    public function setConfigUrl($configUrl)
    {
        $this->configUrl = $configUrl;

        return $this;
    }

    /**
     * Get configUrl
     *
     * @return string 
     */
    public function getConfigUrl()
    {
        return $this->configUrl;
    }

    /**
     * Set enabledGroups
     *
     * @param string $enabledGroups
     * @return Plugins
     */
    public function setEnabledGroups($enabledGroups)
    {
        $this->enabledGroups = $enabledGroups;

        return $this;
    }

    /**
     * Get enabledGroups
     *
     * @return string 
     */
    public function getEnabledGroups()
    {
        return $this->enabledGroups;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     * @return Plugins
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }
}
