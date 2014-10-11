<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CollectionSavedsearch
 *
 * @ORM\Table(name="collection_savedsearch")
 * @ORM\Entity
 */
class CollectionSavedsearch
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
     * @ORM\Column(name="collection", type="integer", nullable=true)
     */
    private $collection;

    /**
     * @var string
     *
     * @ORM\Column(name="search", type="text", nullable=true)
     */
    private $search;

    /**
     * @var string
     *
     * @ORM\Column(name="restypes", type="text", nullable=true)
     */
    private $restypes;

    /**
     * @var integer
     *
     * @ORM\Column(name="starsearch", type="integer", nullable=true)
     */
    private $starsearch;

    /**
     * @var integer
     *
     * @ORM\Column(name="archive", type="integer", nullable=true)
     */
    private $archive;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created", type="datetime", nullable=false)
     */
    private $created = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     *
     * @ORM\Column(name="result_limit", type="integer", nullable=true)
     */
    private $resultLimit;



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
     * Set collection
     *
     * @param integer $collection
     * @return CollectionSavedsearch
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
     * Set search
     *
     * @param string $search
     * @return CollectionSavedsearch
     */
    public function setSearch($search)
    {
        $this->search = $search;

        return $this;
    }

    /**
     * Get search
     *
     * @return string 
     */
    public function getSearch()
    {
        return $this->search;
    }

    /**
     * Set restypes
     *
     * @param string $restypes
     * @return CollectionSavedsearch
     */
    public function setRestypes($restypes)
    {
        $this->restypes = $restypes;

        return $this;
    }

    /**
     * Get restypes
     *
     * @return string 
     */
    public function getRestypes()
    {
        return $this->restypes;
    }

    /**
     * Set starsearch
     *
     * @param integer $starsearch
     * @return CollectionSavedsearch
     */
    public function setStarsearch($starsearch)
    {
        $this->starsearch = $starsearch;

        return $this;
    }

    /**
     * Get starsearch
     *
     * @return integer 
     */
    public function getStarsearch()
    {
        return $this->starsearch;
    }

    /**
     * Set archive
     *
     * @param integer $archive
     * @return CollectionSavedsearch
     */
    public function setArchive($archive)
    {
        $this->archive = $archive;

        return $this;
    }

    /**
     * Get archive
     *
     * @return integer 
     */
    public function getArchive()
    {
        return $this->archive;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return CollectionSavedsearch
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
     * Set resultLimit
     *
     * @param integer $resultLimit
     * @return CollectionSavedsearch
     */
    public function setResultLimit($resultLimit)
    {
        $this->resultLimit = $resultLimit;

        return $this;
    }

    /**
     * Get resultLimit
     *
     * @return integer 
     */
    public function getResultLimit()
    {
        return $this->resultLimit;
    }
}
