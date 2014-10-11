<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * KeywordRelated
 *
 * @ORM\Table(name="keyword_related")
 * @ORM\Entity
 */
class KeywordRelated
{
    /**
     * @var integer
     *
     * @ORM\Column(name="keyword", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $keyword = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="related", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $related = '0';



    /**
     * Set keyword
     *
     * @param integer $keyword
     * @return KeywordRelated
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

    /**
     * Set related
     *
     * @param integer $related
     * @return KeywordRelated
     */
    public function setRelated($related)
    {
        $this->related = $related;

        return $this;
    }

    /**
     * Get related
     *
     * @return integer 
     */
    public function getRelated()
    {
        return $this->related;
    }
}
