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
 * ResourceAltFiles
 *
 * @ORM\Table(name="resource_alt_files")
 * @ORM\Entity
 */
class ResourceAltFiles
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
     * @ORM\Column(name="resource", type="integer", nullable=true)
     */
    private $resource;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="file_name", type="string", length=200, nullable=true)
     */
    private $fileName;

    /**
     * @var string
     *
     * @ORM\Column(name="file_extension", type="string", length=10, nullable=true)
     */
    private $fileExtension;

    /**
     * @var integer
     *
     * @ORM\Column(name="file_size", type="bigint", nullable=true)
     */
    private $fileSize = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="unoconv", type="integer", nullable=true)
     */
    private $unoconv;

    /**
     * @var string
     *
     * @ORM\Column(name="alt_type", type="string", length=100, nullable=true)
     */
    private $altType;

    /**
     * @var integer
     *
     * @ORM\Column(name="page_count", type="integer", nullable=true)
     */
    private $pageCount;



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
     * Set resource
     *
     * @param integer $resource
     * @return ResourceAltFiles
     */
    public function setResource($resource)
    {
        $this->resource = $resource;

        return $this;
    }

    /**
     * Get resource
     *
     * @return integer 
     */
    public function getResource()
    {
        return $this->resource;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return ResourceAltFiles
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
     * Set description
     *
     * @param string $description
     * @return ResourceAltFiles
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set fileName
     *
     * @param string $fileName
     * @return ResourceAltFiles
     */
    public function setFileName($fileName)
    {
        $this->fileName = $fileName;

        return $this;
    }

    /**
     * Get fileName
     *
     * @return string 
     */
    public function getFileName()
    {
        return $this->fileName;
    }

    /**
     * Set fileExtension
     *
     * @param string $fileExtension
     * @return ResourceAltFiles
     */
    public function setFileExtension($fileExtension)
    {
        $this->fileExtension = $fileExtension;

        return $this;
    }

    /**
     * Get fileExtension
     *
     * @return string 
     */
    public function getFileExtension()
    {
        return $this->fileExtension;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     * @return ResourceAltFiles
     */
    public function setFileSize($fileSize)
    {
        $this->fileSize = $fileSize;

        return $this;
    }

    /**
     * Get fileSize
     *
     * @return integer 
     */
    public function getFileSize()
    {
        return $this->fileSize;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return ResourceAltFiles
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    /**
     * Get creationDate
     *
     * @return \DateTime 
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * Set unoconv
     *
     * @param integer $unoconv
     * @return ResourceAltFiles
     */
    public function setUnoconv($unoconv)
    {
        $this->unoconv = $unoconv;

        return $this;
    }

    /**
     * Get unoconv
     *
     * @return integer 
     */
    public function getUnoconv()
    {
        return $this->unoconv;
    }

    /**
     * Set altType
     *
     * @param string $altType
     * @return ResourceAltFiles
     */
    public function setAltType($altType)
    {
        $this->altType = $altType;

        return $this;
    }

    /**
     * Get altType
     *
     * @return string 
     */
    public function getAltType()
    {
        return $this->altType;
    }

    /**
     * Set pageCount
     *
     * @param integer $pageCount
     * @return ResourceAltFiles
     */
    public function setPageCount($pageCount)
    {
        $this->pageCount = $pageCount;

        return $this;
    }

    /**
     * Get pageCount
     *
     * @return integer 
     */
    public function getPageCount()
    {
        return $this->pageCount;
    }
}
