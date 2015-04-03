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
 * ResourceTypeField
 *
 * @ORM\Table(name="resource_type_field", indexes={@ORM\Index(name="resource_type", columns={"resource_type"})})
 * @ORM\Entity
 */
class ResourceTypeField
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
     * @ORM\Column(name="name", type="string", length=50, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=400, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="type", type="integer", nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="options", type="text", nullable=true)
     */
    private $options;

    /**
     * @var integer
     *
     * @ORM\Column(name="order_by", type="integer", nullable=true)
     */
    private $orderBy = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="keywords_index", type="integer", nullable=true)
     */
    private $keywordsIndex = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="partial_index", type="integer", nullable=true)
     */
    private $partialIndex = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="resource_type", type="integer", nullable=true)
     */
    private $resourceType = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="resource_column", type="string", length=50, nullable=true)
     */
    private $resourceColumn;

    /**
     * @var integer
     *
     * @ORM\Column(name="display_field", type="integer", nullable=true)
     */
    private $displayField = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="use_for_similar", type="integer", nullable=true)
     */
    private $useForSimilar = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="iptc_equiv", type="string", length=20, nullable=true)
     */
    private $iptcEquiv;

    /**
     * @var string
     *
     * @ORM\Column(name="display_template", type="text", nullable=true)
     */
    private $displayTemplate;

    /**
     * @var string
     *
     * @ORM\Column(name="tab_name", type="string", length=50, nullable=true)
     */
    private $tabName;

    /**
     * @var integer
     *
     * @ORM\Column(name="required", type="integer", nullable=true)
     */
    private $required = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="smart_theme_name", type="string", length=200, nullable=true)
     */
    private $smartThemeName;

    /**
     * @var string
     *
     * @ORM\Column(name="exiftool_field", type="string", length=200, nullable=true)
     */
    private $exiftoolField;

    /**
     * @var integer
     *
     * @ORM\Column(name="advanced_search", type="integer", nullable=true)
     */
    private $advancedSearch = '1';

    /**
     * @var integer
     *
     * @ORM\Column(name="simple_search", type="integer", nullable=true)
     */
    private $simpleSearch = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="help_text", type="text", nullable=true)
     */
    private $helpText;

    /**
     * @var integer
     *
     * @ORM\Column(name="display_as_dropdown", type="integer", nullable=true)
     */
    private $displayAsDropdown = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="external_user_access", type="integer", nullable=true)
     */
    private $externalUserAccess = '1';

    /**
     * @var string
     *
     * @ORM\Column(name="autocomplete_macro", type="text", nullable=true)
     */
    private $autocompleteMacro;

    /**
     * @var integer
     *
     * @ORM\Column(name="hide_when_uploading", type="integer", nullable=true)
     */
    private $hideWhenUploading = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="hide_when_restricted", type="integer", nullable=true)
     */
    private $hideWhenRestricted = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="value_filter", type="text", nullable=true)
     */
    private $valueFilter;

    /**
     * @var string
     *
     * @ORM\Column(name="exiftool_filter", type="text", nullable=true)
     */
    private $exiftoolFilter;

    /**
     * @var integer
     *
     * @ORM\Column(name="omit_when_copying", type="integer", nullable=true)
     */
    private $omitWhenCopying = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="tooltip_text", type="text", nullable=true)
     */
    private $tooltipText;

    /**
     * @var string
     *
     * @ORM\Column(name="regexp_filter", type="string", length=400, nullable=true)
     */
    private $regexpFilter;

    /**
     * @var integer
     *
     * @ORM\Column(name="sync_field", type="integer", nullable=true)
     */
    private $syncField;

    /**
     * @var string
     *
     * @ORM\Column(name="display_condition", type="string", length=400, nullable=true)
     */
    private $displayCondition;

    /**
     * @var string
     *
     * @ORM\Column(name="onchange_macro", type="text", nullable=true)
     */
    private $onchangeMacro;



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
     * Set name
     *
     * @param string $name
     * @return ResourceTypeField
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
     * Set title
     *
     * @param string $title
     * @return ResourceTypeField
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set type
     *
     * @param integer $type
     * @return ResourceTypeField
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return integer 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set options
     *
     * @param string $options
     * @return ResourceTypeField
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return string 
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Set orderBy
     *
     * @param integer $orderBy
     * @return ResourceTypeField
     */
    public function setOrderBy($orderBy)
    {
        $this->orderBy = $orderBy;

        return $this;
    }

    /**
     * Get orderBy
     *
     * @return integer 
     */
    public function getOrderBy()
    {
        return $this->orderBy;
    }

    /**
     * Set keywordsIndex
     *
     * @param integer $keywordsIndex
     * @return ResourceTypeField
     */
    public function setKeywordsIndex($keywordsIndex)
    {
        $this->keywordsIndex = $keywordsIndex;

        return $this;
    }

    /**
     * Get keywordsIndex
     *
     * @return integer 
     */
    public function getKeywordsIndex()
    {
        return $this->keywordsIndex;
    }

    /**
     * Set partialIndex
     *
     * @param integer $partialIndex
     * @return ResourceTypeField
     */
    public function setPartialIndex($partialIndex)
    {
        $this->partialIndex = $partialIndex;

        return $this;
    }

    /**
     * Get partialIndex
     *
     * @return integer 
     */
    public function getPartialIndex()
    {
        return $this->partialIndex;
    }

    /**
     * Set resourceType
     *
     * @param integer $resourceType
     * @return ResourceTypeField
     */
    public function setResourceType($resourceType)
    {
        $this->resourceType = $resourceType;

        return $this;
    }

    /**
     * Get resourceType
     *
     * @return integer 
     */
    public function getResourceType()
    {
        return $this->resourceType;
    }

    /**
     * Set resourceColumn
     *
     * @param string $resourceColumn
     * @return ResourceTypeField
     */
    public function setResourceColumn($resourceColumn)
    {
        $this->resourceColumn = $resourceColumn;

        return $this;
    }

    /**
     * Get resourceColumn
     *
     * @return string 
     */
    public function getResourceColumn()
    {
        return $this->resourceColumn;
    }

    /**
     * Set displayField
     *
     * @param integer $displayField
     * @return ResourceTypeField
     */
    public function setDisplayField($displayField)
    {
        $this->displayField = $displayField;

        return $this;
    }

    /**
     * Get displayField
     *
     * @return integer 
     */
    public function getDisplayField()
    {
        return $this->displayField;
    }

    /**
     * Set useForSimilar
     *
     * @param integer $useForSimilar
     * @return ResourceTypeField
     */
    public function setUseForSimilar($useForSimilar)
    {
        $this->useForSimilar = $useForSimilar;

        return $this;
    }

    /**
     * Get useForSimilar
     *
     * @return integer 
     */
    public function getUseForSimilar()
    {
        return $this->useForSimilar;
    }

    /**
     * Set iptcEquiv
     *
     * @param string $iptcEquiv
     * @return ResourceTypeField
     */
    public function setIptcEquiv($iptcEquiv)
    {
        $this->iptcEquiv = $iptcEquiv;

        return $this;
    }

    /**
     * Get iptcEquiv
     *
     * @return string 
     */
    public function getIptcEquiv()
    {
        return $this->iptcEquiv;
    }

    /**
     * Set displayTemplate
     *
     * @param string $displayTemplate
     * @return ResourceTypeField
     */
    public function setDisplayTemplate($displayTemplate)
    {
        $this->displayTemplate = $displayTemplate;

        return $this;
    }

    /**
     * Get displayTemplate
     *
     * @return string 
     */
    public function getDisplayTemplate()
    {
        return $this->displayTemplate;
    }

    /**
     * Set tabName
     *
     * @param string $tabName
     * @return ResourceTypeField
     */
    public function setTabName($tabName)
    {
        $this->tabName = $tabName;

        return $this;
    }

    /**
     * Get tabName
     *
     * @return string 
     */
    public function getTabName()
    {
        return $this->tabName;
    }

    /**
     * Set required
     *
     * @param integer $required
     * @return ResourceTypeField
     */
    public function setRequired($required)
    {
        $this->required = $required;

        return $this;
    }

    /**
     * Get required
     *
     * @return integer 
     */
    public function getRequired()
    {
        return $this->required;
    }

    /**
     * Set smartThemeName
     *
     * @param string $smartThemeName
     * @return ResourceTypeField
     */
    public function setSmartThemeName($smartThemeName)
    {
        $this->smartThemeName = $smartThemeName;

        return $this;
    }

    /**
     * Get smartThemeName
     *
     * @return string 
     */
    public function getSmartThemeName()
    {
        return $this->smartThemeName;
    }

    /**
     * Set exiftoolField
     *
     * @param string $exiftoolField
     * @return ResourceTypeField
     */
    public function setExiftoolField($exiftoolField)
    {
        $this->exiftoolField = $exiftoolField;

        return $this;
    }

    /**
     * Get exiftoolField
     *
     * @return string 
     */
    public function getExiftoolField()
    {
        return $this->exiftoolField;
    }

    /**
     * Set advancedSearch
     *
     * @param integer $advancedSearch
     * @return ResourceTypeField
     */
    public function setAdvancedSearch($advancedSearch)
    {
        $this->advancedSearch = $advancedSearch;

        return $this;
    }

    /**
     * Get advancedSearch
     *
     * @return integer 
     */
    public function getAdvancedSearch()
    {
        return $this->advancedSearch;
    }

    /**
     * Set simpleSearch
     *
     * @param integer $simpleSearch
     * @return ResourceTypeField
     */
    public function setSimpleSearch($simpleSearch)
    {
        $this->simpleSearch = $simpleSearch;

        return $this;
    }

    /**
     * Get simpleSearch
     *
     * @return integer 
     */
    public function getSimpleSearch()
    {
        return $this->simpleSearch;
    }

    /**
     * Set helpText
     *
     * @param string $helpText
     * @return ResourceTypeField
     */
    public function setHelpText($helpText)
    {
        $this->helpText = $helpText;

        return $this;
    }

    /**
     * Get helpText
     *
     * @return string 
     */
    public function getHelpText()
    {
        return $this->helpText;
    }

    /**
     * Set displayAsDropdown
     *
     * @param integer $displayAsDropdown
     * @return ResourceTypeField
     */
    public function setDisplayAsDropdown($displayAsDropdown)
    {
        $this->displayAsDropdown = $displayAsDropdown;

        return $this;
    }

    /**
     * Get displayAsDropdown
     *
     * @return integer 
     */
    public function getDisplayAsDropdown()
    {
        return $this->displayAsDropdown;
    }

    /**
     * Set externalUserAccess
     *
     * @param integer $externalUserAccess
     * @return ResourceTypeField
     */
    public function setExternalUserAccess($externalUserAccess)
    {
        $this->externalUserAccess = $externalUserAccess;

        return $this;
    }

    /**
     * Get externalUserAccess
     *
     * @return integer 
     */
    public function getExternalUserAccess()
    {
        return $this->externalUserAccess;
    }

    /**
     * Set autocompleteMacro
     *
     * @param string $autocompleteMacro
     * @return ResourceTypeField
     */
    public function setAutocompleteMacro($autocompleteMacro)
    {
        $this->autocompleteMacro = $autocompleteMacro;

        return $this;
    }

    /**
     * Get autocompleteMacro
     *
     * @return string 
     */
    public function getAutocompleteMacro()
    {
        return $this->autocompleteMacro;
    }

    /**
     * Set hideWhenUploading
     *
     * @param integer $hideWhenUploading
     * @return ResourceTypeField
     */
    public function setHideWhenUploading($hideWhenUploading)
    {
        $this->hideWhenUploading = $hideWhenUploading;

        return $this;
    }

    /**
     * Get hideWhenUploading
     *
     * @return integer 
     */
    public function getHideWhenUploading()
    {
        return $this->hideWhenUploading;
    }

    /**
     * Set hideWhenRestricted
     *
     * @param integer $hideWhenRestricted
     * @return ResourceTypeField
     */
    public function setHideWhenRestricted($hideWhenRestricted)
    {
        $this->hideWhenRestricted = $hideWhenRestricted;

        return $this;
    }

    /**
     * Get hideWhenRestricted
     *
     * @return integer 
     */
    public function getHideWhenRestricted()
    {
        return $this->hideWhenRestricted;
    }

    /**
     * Set valueFilter
     *
     * @param string $valueFilter
     * @return ResourceTypeField
     */
    public function setValueFilter($valueFilter)
    {
        $this->valueFilter = $valueFilter;

        return $this;
    }

    /**
     * Get valueFilter
     *
     * @return string 
     */
    public function getValueFilter()
    {
        return $this->valueFilter;
    }

    /**
     * Set exiftoolFilter
     *
     * @param string $exiftoolFilter
     * @return ResourceTypeField
     */
    public function setExiftoolFilter($exiftoolFilter)
    {
        $this->exiftoolFilter = $exiftoolFilter;

        return $this;
    }

    /**
     * Get exiftoolFilter
     *
     * @return string 
     */
    public function getExiftoolFilter()
    {
        return $this->exiftoolFilter;
    }

    /**
     * Set omitWhenCopying
     *
     * @param integer $omitWhenCopying
     * @return ResourceTypeField
     */
    public function setOmitWhenCopying($omitWhenCopying)
    {
        $this->omitWhenCopying = $omitWhenCopying;

        return $this;
    }

    /**
     * Get omitWhenCopying
     *
     * @return integer 
     */
    public function getOmitWhenCopying()
    {
        return $this->omitWhenCopying;
    }

    /**
     * Set tooltipText
     *
     * @param string $tooltipText
     * @return ResourceTypeField
     */
    public function setTooltipText($tooltipText)
    {
        $this->tooltipText = $tooltipText;

        return $this;
    }

    /**
     * Get tooltipText
     *
     * @return string 
     */
    public function getTooltipText()
    {
        return $this->tooltipText;
    }

    /**
     * Set regexpFilter
     *
     * @param string $regexpFilter
     * @return ResourceTypeField
     */
    public function setRegexpFilter($regexpFilter)
    {
        $this->regexpFilter = $regexpFilter;

        return $this;
    }

    /**
     * Get regexpFilter
     *
     * @return string 
     */
    public function getRegexpFilter()
    {
        return $this->regexpFilter;
    }

    /**
     * Set syncField
     *
     * @param integer $syncField
     * @return ResourceTypeField
     */
    public function setSyncField($syncField)
    {
        $this->syncField = $syncField;

        return $this;
    }

    /**
     * Get syncField
     *
     * @return integer 
     */
    public function getSyncField()
    {
        return $this->syncField;
    }

    /**
     * Set displayCondition
     *
     * @param string $displayCondition
     * @return ResourceTypeField
     */
    public function setDisplayCondition($displayCondition)
    {
        $this->displayCondition = $displayCondition;

        return $this;
    }

    /**
     * Get displayCondition
     *
     * @return string 
     */
    public function getDisplayCondition()
    {
        return $this->displayCondition;
    }

    /**
     * Set onchangeMacro
     *
     * @param string $onchangeMacro
     * @return ResourceTypeField
     */
    public function setOnchangeMacro($onchangeMacro)
    {
        $this->onchangeMacro = $onchangeMacro;

        return $this;
    }

    /**
     * Get onchangeMacro
     *
     * @return string 
     */
    public function getOnchangeMacro()
    {
        return $this->onchangeMacro;
    }
}
