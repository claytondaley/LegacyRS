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
 * UserCollection
 *
 * @ORM\Table(name="user_collection", indexes={@ORM\Index(name="collection", columns={"collection"}), @ORM\Index(name="user", columns={"user"})})
 * @ORM\Entity
 */
class UserCollection
{
    /**
     * @var integer
     *
     * @ORM\Column(name="user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $user = '0';

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
     * @ORM\Column(name="request_feedback", type="integer", nullable=true)
     */
    private $requestFeedback = '0';

    /**
     * Set user
     *
     * @param integer $user
     * @return UserCollection
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
     * Set collection
     *
     * @param integer $collection
     * @return UserCollection
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
     * Set requestFeedback
     *
     * @param integer $requestFeedback
     * @return UserCollection
     */
    public function setRequestFeedback($requestFeedback)
    {
        $this->requestFeedback = $requestFeedback;

        return $this;
    }

    /**
     * Get requestFeedback
     *
     * @return integer 
     */
    public function getRequestFeedback()
    {
        return $this->requestFeedback;
    }
}
