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
 * CollectionResource
 *
 * @ORM\Table(name="collection_resource", indexes={@ORM\Index(name="collection", columns={"collection"})})
 * @ORM\Entity
 */
class CollectionResource
{
    /**
     * @var integer
     *
     * @ORM\Column(name="collection", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $collection = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="resource", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $resource = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_added", type="datetime", nullable=false)
     */
    private $dateAdded = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="comment", type="text", nullable=true)
     */
    private $comment;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var integer
     *
     * @ORM\Column(name="use_as_theme_thumbnail", type="integer", nullable=true)
     */
    private $useAsThemeThumbnail;

    /**
     * @var string
     *
     * @ORM\Column(name="purchase_size", type="string", length=10, nullable=true)
     */
    private $purchaseSize;

    /**
     * @var integer
     *
     * @ORM\Column(name="purchase_complete", type="integer", nullable=true)
     */
    private $purchaseComplete = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="purchase_price", type="decimal", precision=10, scale=2, nullable=true)
     */
    private $purchasePrice = '0.00';

    /**
     * @var integer
     *
     * @ORM\Column(name="sortorder", type="integer", nullable=true)
     */
    private $sortorder;



    /**
     * Set collection
     *
     * @param integer $collection
     * @return CollectionResource
     */
    public function setCollection($collection)
    {
        $this->collection = $collection;

        return $this;
    }

    /**
     * Get collection
     *
     * @return integer 
     */
    public function getCollection()
    {
        return $this->collection;
    }

    /**
     * Set resource
     *
     * @param integer $resource
     * @return CollectionResource
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
     * Set dateAdded
     *
     * @param \DateTime $dateAdded
     * @return CollectionResource
     */
    public function setDateAdded($dateAdded)
    {
        $this->dateAdded = $dateAdded;

        return $this;
    }

    /**
     * Get dateAdded
     *
     * @return \DateTime 
     */
    public function getDateAdded()
    {
        return $this->dateAdded;
    }

    /**
     * Set comment
     *
     * @param string $comment
     * @return CollectionResource
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string 
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set rating
     *
     * @param integer $rating
     * @return CollectionResource
     */
    public function setRating($rating)
    {
        $this->rating = $rating;

        return $this;
    }

    /**
     * Get rating
     *
     * @return integer 
     */
    public function getRating()
    {
        return $this->rating;
    }

    /**
     * Set useAsThemeThumbnail
     *
     * @param integer $useAsThemeThumbnail
     * @return CollectionResource
     */
    public function setUseAsThemeThumbnail($useAsThemeThumbnail)
    {
        $this->useAsThemeThumbnail = $useAsThemeThumbnail;

        return $this;
    }

    /**
     * Get useAsThemeThumbnail
     *
     * @return integer 
     */
    public function getUseAsThemeThumbnail()
    {
        return $this->useAsThemeThumbnail;
    }

    /**
     * Set purchaseSize
     *
     * @param string $purchaseSize
     * @return CollectionResource
     */
    public function setPurchaseSize($purchaseSize)
    {
        $this->purchaseSize = $purchaseSize;

        return $this;
    }

    /**
     * Get purchaseSize
     *
     * @return string 
     */
    public function getPurchaseSize()
    {
        return $this->purchaseSize;
    }

    /**
     * Set purchaseComplete
     *
     * @param integer $purchaseComplete
     * @return CollectionResource
     */
    public function setPurchaseComplete($purchaseComplete)
    {
        $this->purchaseComplete = $purchaseComplete;

        return $this;
    }

    /**
     * Get purchaseComplete
     *
     * @return integer 
     */
    public function getPurchaseComplete()
    {
        return $this->purchaseComplete;
    }

    /**
     * Set purchasePrice
     *
     * @param string $purchasePrice
     * @return CollectionResource
     */
    public function setPurchasePrice($purchasePrice)
    {
        $this->purchasePrice = $purchasePrice;

        return $this;
    }

    /**
     * Get purchasePrice
     *
     * @return string 
     */
    public function getPurchasePrice()
    {
        return $this->purchasePrice;
    }

    /**
     * Set sortorder
     *
     * @param integer $sortorder
     * @return CollectionResource
     */
    public function setSortorder($sortorder)
    {
        $this->sortorder = $sortorder;

        return $this;
    }

    /**
     * Get sortorder
     *
     * @return integer 
     */
    public function getSortorder()
    {
        return $this->sortorder;
    }
}
