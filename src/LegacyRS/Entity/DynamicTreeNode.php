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
 * DynamicTreeNode
 *
 * @ORM\Table(name="dynamic_tree_node", indexes={@ORM\Index(name="parent", columns={"parent"}), @ORM\Index(name="resource_type_field", columns={"resource_type_field"})})
 * @ORM\Entity
 */
class DynamicTreeNode
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
     * @ORM\Column(name="resource_type_field", type="integer", nullable=true)
     */
    private $resourceTypeField = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="parent", type="integer", nullable=true)
     */
    private $parent = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;



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
     * Set resourceTypeField
     *
     * @param integer $resourceTypeField
     * @return DynamicTreeNode
     */
    public function setResourceTypeField($resourceTypeField)
    {
        $this->resourceTypeField = $resourceTypeField;

        return $this;
    }

    /**
     * Get resourceTypeField
     *
     * @return integer 
     */
    public function getResourceTypeField()
    {
        return $this->resourceTypeField;
    }

    /**
     * Set parent
     *
     * @param integer $parent
     * @return DynamicTreeNode
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Get parent
     *
     * @return integer 
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return DynamicTreeNode
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
}
