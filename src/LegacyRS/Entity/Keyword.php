<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Keyword
 *
 * @ORM\Table(name="keyword", indexes={@ORM\Index(name="keyword", columns={"keyword"}), @ORM\Index(name="keyword_hit_count", columns={"hit_count"})})
 * @ORM\Entity
 */
class Keyword
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
     * @ORM\Column(name="keyword", type="string", length=100, nullable=true)
     */
    private $keyword;

    /**
     * @var string
     *
     * @ORM\Column(name="soundex", type="string", length=50, nullable=true)
     */
    private $soundex;

    /**
     * @var integer
     *
     * @ORM\Column(name="hit_count", type="integer", nullable=true)
     */
    private $hitCount = '0';



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
     * Set keyword
     *
     * @param string $keyword
     * @return Keyword
     */
    public function setKeyword($keyword)
    {
        $this->keyword = $keyword;

        return $this;
    }

    /**
     * Get keyword
     *
     * @return string 
     */
    public function getKeyword()
    {
        return $this->keyword;
    }

    /**
     * Set soundex
     *
     * @param string $soundex
     * @return Keyword
     */
    public function setSoundex($soundex)
    {
        $this->soundex = $soundex;

        return $this;
    }

    /**
     * Get soundex
     *
     * @return string 
     */
    public function getSoundex()
    {
        return $this->soundex;
    }

    /**
     * Set hitCount
     *
     * @param integer $hitCount
     * @return Keyword
     */
    public function setHitCount($hitCount)
    {
        $this->hitCount = $hitCount;

        return $this;
    }

    /**
     * Get hitCount
     *
     * @return integer 
     */
    public function getHitCount()
    {
        return $this->hitCount;
    }
}
