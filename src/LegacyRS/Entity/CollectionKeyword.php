<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CollectionKeyword
 *
 * @ORM\Table(name="collection_keyword", indexes={@ORM\Index(name="collection", columns={"collection"}), @ORM\Index(name="keyword", columns={"keyword"})})
 * @ORM\Entity
 */
class CollectionKeyword
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
     * @ORM\Column(name="keyword", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $keyword = '0';



    /**
     * Set collection
     *
     * @param integer $collection
     * @return CollectionKeyword
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
     * Set keyword
     *
     * @param integer $keyword
     * @return CollectionKeyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return integer 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }
}
