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
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="ref_parent", columns={"ref_parent"}), @ORM\Index(name="collection_ref", columns={"collection_ref"}), @ORM\Index(name="resource_ref", columns={"resource_ref"})})
 * @ORM\Entity
 */
class Comment
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
     * @ORM\Column(name="ref_parent", type="integer", nullable=true)
     */
    private $refParent;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="hide", type="integer", nullable=true)
     */
    private $hide = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="collection_ref", type="integer", nullable=true)
     */
    private $collectionRef;

    /**
     * @var integer
     *
     * @ORM\Column(name="resource_ref", type="integer", nullable=true)
     */
    private $resourceRef;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_ref", type="integer", nullable=true)
     */
    private $userRef;

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
     * @var string
     *
     * @ORM\Column(name="website_url", type="text", nullable=true)
     */
    private $websiteUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="body", type="text", nullable=true)
     */
    private $body;



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
     * Set refParent
     *
     * @param integer $refParent
     * @return Comment
     */
    public function setRefParent($refParent)
    {
        $this->refParent = $refParent;

        return $this;
    }

    /**
     * Get refParent
     *
     * @return integer 
     */
    public function getRefParent()
    {
        return $this->refParent;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Comment
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
     * Set hide
     *
     * @param integer $hide
     * @return Comment
     */
    public function setHide($hide)
    {
        $this->hide = $hide;

        return $this;
    }

    /**
     * Get hide
     *
     * @return integer 
     */
    public function getHide()
    {
        return $this->hide;
    }

    /**
     * Set collectionRef
     *
     * @param integer $collectionRef
     * @return Comment
     */
    public function setCollectionRef($collectionRef)
    {
        $this->collectionRef = $collectionRef;

        return $this;
    }

    /**
     * Get collectionRef
     *
     * @return integer 
     */
    public function getCollectionRef()
    {
        return $this->collectionRef;
    }

    /**
     * Set resourceRef
     *
     * @param integer $resourceRef
     * @return Comment
     */
    public function setResourceRef($resourceRef)
    {
        $this->resourceRef = $resourceRef;

        return $this;
    }

    /**
     * Get resourceRef
     *
     * @return integer 
     */
    public function getResourceRef()
    {
        return $this->resourceRef;
    }

    /**
     * Set userRef
     *
     * @param integer $userRef
     * @return Comment
     */
    public function setUserRef($userRef)
    {
        $this->userRef = $userRef;

        return $this;
    }

    /**
     * Get userRef
     *
     * @return integer 
     */
    public function getUserRef()
    {
        return $this->userRef;
    }

    /**
     * Set fullname
     *
     * @param string $fullname
     * @return Comment
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
     * @return Comment
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
     * Set websiteUrl
     *
     * @param string $websiteUrl
     * @return Comment
     */
    public function setWebsiteUrl($websiteUrl)
    {
        $this->websiteUrl = $websiteUrl;

        return $this;
    }

    /**
     * Get websiteUrl
     *
     * @return string 
     */
    public function getWebsiteUrl()
    {
        return $this->websiteUrl;
    }

    /**
     * Set body
     *
     * @param string $body
     * @return Comment
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * Get body
     *
     * @return string 
     */
    public function getBody()
    {
        return $this->body;
    }
}
