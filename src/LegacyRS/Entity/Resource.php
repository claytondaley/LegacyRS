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
 * Resource
 *
 * @ORM\Table(name="resource", indexes={@ORM\Index(name="hit_count", columns={"hit_count"}), @ORM\Index(name="resource_archive", columns={"archive"}), @ORM\Index(name="resource_access", columns={"access"}), @ORM\Index(name="resource_type", columns={"resource_type"}), @ORM\Index(name="resource_creation_date", columns={"creation_date"}), @ORM\Index(name="rating", columns={"rating"}), @ORM\Index(name="colour_key", columns={"colour_key"}), @ORM\Index(name="has_image", columns={"has_image"}), @ORM\Index(name="file_checksum", columns={"file_checksum"}), @ORM\Index(name="geo_lat", columns={"geo_lat"}), @ORM\Index(name="geo_long", columns={"geo_long"}), @ORM\Index(name="disk_usage", columns={"disk_usage"}), @ORM\Index(name="created_by", columns={"created_by"})})
 * @ORM\Entity
 */
class Resource
{
    /**
     * @var integer
     *
     * @ORM\Column(name="ref", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=200, nullable=true)
     */
    private $title;

    /**
     * @var integer
     *
     * @ORM\Column(name="resource_type", type="integer", nullable=true)
     */
    private $resourceType;

    /**
     * @var integer
     *
     * @ORM\Column(name="has_image", type="integer", nullable=true)
     */
    private $hasImage = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="is_transcoding", type="integer", nullable=true)
     */
    private $isTranscoding = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="hit_count", type="integer", nullable=true)
     */
    private $hitCount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="new_hit_count", type="integer", nullable=true)
     */
    private $newHitCount = '0';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="creation_date", type="datetime", nullable=true)
     */
    private $creationDate;

    /**
     * @var integer
     *
     * @ORM\Column(name="rating", type="integer", nullable=true)
     */
    private $rating;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_rating", type="integer", nullable=true)
     */
    private $userRating;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_rating_count", type="integer", nullable=true)
     */
    private $userRatingCount;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_rating_total", type="integer", nullable=true)
     */
    private $userRatingTotal;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=200, nullable=true)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="file_extension", type="string", length=10, nullable=true)
     */
    private $fileExtension;

    /**
     * @var string
     *
     * @ORM\Column(name="preview_extension", type="string", length=10, nullable=true)
     */
    private $previewExtension;

    /**
     * @var integer
     *
     * @ORM\Column(name="image_red", type="integer", nullable=true)
     */
    private $imageRed;

    /**
     * @var integer
     *
     * @ORM\Column(name="image_green", type="integer", nullable=true)
     */
    private $imageGreen;

    /**
     * @var integer
     *
     * @ORM\Column(name="image_blue", type="integer", nullable=true)
     */
    private $imageBlue;

    /**
     * @var integer
     *
     * @ORM\Column(name="thumb_width", type="integer", nullable=true)
     */
    private $thumbWidth;

    /**
     * @var integer
     *
     * @ORM\Column(name="thumb_height", type="integer", nullable=true)
     */
    private $thumbHeight;

    /**
     * @var integer
     *
     * @ORM\Column(name="archive", type="integer", nullable=true)
     */
    private $archive = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="access", type="integer", nullable=true)
     */
    private $access = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="colour_key", type="string", length=5, nullable=true)
     */
    private $colourKey;

    /**
     * @var integer
     *
     * @ORM\Column(name="created_by", type="integer", nullable=true)
     */
    private $createdBy;

    /**
     * @var string
     *
     * @ORM\Column(name="file_path", type="string", length=500, nullable=true)
     */
    private $filePath;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="file_modified", type="datetime", nullable=true)
     */
    private $fileModified;

    /**
     * @var string
     *
     * @ORM\Column(name="file_checksum", type="string", length=32, nullable=true)
     */
    private $fileChecksum;

    /**
     * @var integer
     *
     * @ORM\Column(name="request_count", type="integer", nullable=true)
     */
    private $requestCount = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="expiry_notification_sent", type="integer", nullable=true)
     */
    private $expiryNotificationSent = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="preview_tweaks", type="string", length=50, nullable=true)
     */
    private $previewTweaks;

    /**
     * @var float
     *
     * @ORM\Column(name="geo_lat", type="float", precision=10, scale=0, nullable=true)
     */
    private $geoLat;

    /**
     * @var float
     *
     * @ORM\Column(name="geo_long", type="float", precision=10, scale=0, nullable=true)
     */
    private $geoLong;

    /**
     * @var integer
     *
     * @ORM\Column(name="mapzoom", type="integer", nullable=true)
     */
    private $mapzoom;

    /**
     * @var integer
     *
     * @ORM\Column(name="disk_usage", type="bigint", nullable=true)
     */
    private $diskUsage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="disk_usage_last_updated", type="datetime", nullable=true)
     */
    private $diskUsageLastUpdated;

    /**
     * @var integer
     *
     * @ORM\Column(name="file_size", type="bigint", nullable=true)
     */
    private $fileSize;

    /**
     * @var integer
     *
     * @ORM\Column(name="preview_attempts", type="integer", nullable=true)
     */
    private $previewAttempts;

    /**
     * @var string
     *
     * @ORM\Column(name="field12", type="string", length=200, nullable=true)
     */
    private $field12;

    /**
     * @var string
     *
     * @ORM\Column(name="field8", type="string", length=200, nullable=true)
     */
    private $field8;

    /**
     * @var string
     *
     * @ORM\Column(name="field3", type="string", length=200, nullable=true)
     */
    private $field3;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Resource
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
     * Set resourceType
     *
     * @param integer $resourceType
     * @return Resource
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
     * Set hasImage
     *
     * @param integer $hasImage
     * @return Resource
     */
    public function setHasImage($hasImage)
    {
        $this->hasImage = $hasImage;

        return $this;
    }

    /**
     * Get hasImage
     *
     * @return integer 
     */
    public function getHasImage()
    {
        return $this->hasImage;
    }

    /**
     * Set isTranscoding
     *
     * @param integer $isTranscoding
     * @return Resource
     */
    public function setIsTranscoding($isTranscoding)
    {
        $this->isTranscoding = $isTranscoding;

        return $this;
    }

    /**
     * Get isTranscoding
     *
     * @return integer 
     */
    public function getIsTranscoding()
    {
        return $this->isTranscoding;
    }

    /**
     * Set hitCount
     *
     * @param integer $hitCount
     * @return Resource
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

    /**
     * Set newHitCount
     *
     * @param integer $newHitCount
     * @return Resource
     */
    public function setNewHitCount($newHitCount)
    {
        $this->newHitCount = $newHitCount;

        return $this;
    }

    /**
     * Get newHitCount
     *
     * @return integer 
     */
    public function getNewHitCount()
    {
        return $this->newHitCount;
    }

    /**
     * Set creationDate
     *
     * @param \DateTime $creationDate
     * @return Resource
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
     * Set rating
     *
     * @param integer $rating
     * @return Resource
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
     * Set userRating
     *
     * @param integer $userRating
     * @return Resource
     */
    public function setUserRating($userRating)
    {
        $this->userRating = $userRating;

        return $this;
    }

    /**
     * Get userRating
     *
     * @return integer 
     */
    public function getUserRating()
    {
        return $this->userRating;
    }

    /**
     * Set userRatingCount
     *
     * @param integer $userRatingCount
     * @return Resource
     */
    public function setUserRatingCount($userRatingCount)
    {
        $this->userRatingCount = $userRatingCount;

        return $this;
    }

    /**
     * Get userRatingCount
     *
     * @return integer 
     */
    public function getUserRatingCount()
    {
        return $this->userRatingCount;
    }

    /**
     * Set userRatingTotal
     *
     * @param integer $userRatingTotal
     * @return Resource
     */
    public function setUserRatingTotal($userRatingTotal)
    {
        $this->userRatingTotal = $userRatingTotal;

        return $this;
    }

    /**
     * Get userRatingTotal
     *
     * @return integer 
     */
    public function getUserRatingTotal()
    {
        return $this->userRatingTotal;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Resource
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set fileExtension
     *
     * @param string $fileExtension
     * @return Resource
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
     * Set previewExtension
     *
     * @param string $previewExtension
     * @return Resource
     */
    public function setPreviewExtension($previewExtension)
    {
        $this->previewExtension = $previewExtension;

        return $this;
    }

    /**
     * Get previewExtension
     *
     * @return string 
     */
    public function getPreviewExtension()
    {
        return $this->previewExtension;
    }

    /**
     * Set imageRed
     *
     * @param integer $imageRed
     * @return Resource
     */
    public function setImageRed($imageRed)
    {
        $this->imageRed = $imageRed;

        return $this;
    }

    /**
     * Get imageRed
     *
     * @return integer 
     */
    public function getImageRed()
    {
        return $this->imageRed;
    }

    /**
     * Set imageGreen
     *
     * @param integer $imageGreen
     * @return Resource
     */
    public function setImageGreen($imageGreen)
    {
        $this->imageGreen = $imageGreen;

        return $this;
    }

    /**
     * Get imageGreen
     *
     * @return integer 
     */
    public function getImageGreen()
    {
        return $this->imageGreen;
    }

    /**
     * Set imageBlue
     *
     * @param integer $imageBlue
     * @return Resource
     */
    public function setImageBlue($imageBlue)
    {
        $this->imageBlue = $imageBlue;

        return $this;
    }

    /**
     * Get imageBlue
     *
     * @return integer 
     */
    public function getImageBlue()
    {
        return $this->imageBlue;
    }

    /**
     * Set thumbWidth
     *
     * @param integer $thumbWidth
     * @return Resource
     */
    public function setThumbWidth($thumbWidth)
    {
        $this->thumbWidth = $thumbWidth;

        return $this;
    }

    /**
     * Get thumbWidth
     *
     * @return integer 
     */
    public function getThumbWidth()
    {
        return $this->thumbWidth;
    }

    /**
     * Set thumbHeight
     *
     * @param integer $thumbHeight
     * @return Resource
     */
    public function setThumbHeight($thumbHeight)
    {
        $this->thumbHeight = $thumbHeight;

        return $this;
    }

    /**
     * Get thumbHeight
     *
     * @return integer 
     */
    public function getThumbHeight()
    {
        return $this->thumbHeight;
    }

    /**
     * Set archive
     *
     * @param integer $archive
     * @return Resource
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
     * Set access
     *
     * @param integer $access
     * @return Resource
     */
    public function setAccess($access)
    {
        $this->access = $access;

        return $this;
    }

    /**
     * Get access
     *
     * @return integer 
     */
    public function getAccess()
    {
        return $this->access;
    }

    /**
     * Set colourKey
     *
     * @param string $colourKey
     * @return Resource
     */
    public function setColourKey($colourKey)
    {
        $this->colourKey = $colourKey;

        return $this;
    }

    /**
     * Get colourKey
     *
     * @return string 
     */
    public function getColourKey()
    {
        return $this->colourKey;
    }

    /**
     * Set createdBy
     *
     * @param integer $createdBy
     * @return Resource
     */
    public function setCreatedBy($createdBy)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return integer 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set filePath
     *
     * @param string $filePath
     * @return Resource
     */
    public function setFilePath($filePath)
    {
        $this->filePath = $filePath;

        return $this;
    }

    /**
     * Get filePath
     *
     * @return string 
     */
    public function getFilePath()
    {
        return $this->filePath;
    }

    /**
     * Set fileModified
     *
     * @param \DateTime $fileModified
     * @return Resource
     */
    public function setFileModified($fileModified)
    {
        $this->fileModified = $fileModified;

        return $this;
    }

    /**
     * Get fileModified
     *
     * @return \DateTime 
     */
    public function getFileModified()
    {
        return $this->fileModified;
    }

    /**
     * Set fileChecksum
     *
     * @param string $fileChecksum
     * @return Resource
     */
    public function setFileChecksum($fileChecksum)
    {
        $this->fileChecksum = $fileChecksum;

        return $this;
    }

    /**
     * Get fileChecksum
     *
     * @return string 
     */
    public function getFileChecksum()
    {
        return $this->fileChecksum;
    }

    /**
     * Set requestCount
     *
     * @param integer $requestCount
     * @return Resource
     */
    public function setRequestCount($requestCount)
    {
        $this->requestCount = $requestCount;

        return $this;
    }

    /**
     * Get requestCount
     *
     * @return integer 
     */
    public function getRequestCount()
    {
        return $this->requestCount;
    }

    /**
     * Set expiryNotificationSent
     *
     * @param integer $expiryNotificationSent
     * @return Resource
     */
    public function setExpiryNotificationSent($expiryNotificationSent)
    {
        $this->expiryNotificationSent = $expiryNotificationSent;

        return $this;
    }

    /**
     * Get expiryNotificationSent
     *
     * @return integer 
     */
    public function getExpiryNotificationSent()
    {
        return $this->expiryNotificationSent;
    }

    /**
     * Set previewTweaks
     *
     * @param string $previewTweaks
     * @return Resource
     */
    public function setPreviewTweaks($previewTweaks)
    {
        $this->previewTweaks = $previewTweaks;

        return $this;
    }

    /**
     * Get previewTweaks
     *
     * @return string 
     */
    public function getPreviewTweaks()
    {
        return $this->previewTweaks;
    }

    /**
     * Set geoLat
     *
     * @param float $geoLat
     * @return Resource
     */
    public function setGeoLat($geoLat)
    {
        $this->geoLat = $geoLat;

        return $this;
    }

    /**
     * Get geoLat
     *
     * @return float 
     */
    public function getGeoLat()
    {
        return $this->geoLat;
    }

    /**
     * Set geoLong
     *
     * @param float $geoLong
     * @return Resource
     */
    public function setGeoLong($geoLong)
    {
        $this->geoLong = $geoLong;

        return $this;
    }

    /**
     * Get geoLong
     *
     * @return float 
     */
    public function getGeoLong()
    {
        return $this->geoLong;
    }

    /**
     * Set mapzoom
     *
     * @param integer $mapzoom
     * @return Resource
     */
    public function setMapzoom($mapzoom)
    {
        $this->mapzoom = $mapzoom;

        return $this;
    }

    /**
     * Get mapzoom
     *
     * @return integer 
     */
    public function getMapzoom()
    {
        return $this->mapzoom;
    }

    /**
     * Set diskUsage
     *
     * @param integer $diskUsage
     * @return Resource
     */
    public function setDiskUsage($diskUsage)
    {
        $this->diskUsage = $diskUsage;

        return $this;
    }

    /**
     * Get diskUsage
     *
     * @return integer 
     */
    public function getDiskUsage()
    {
        return $this->diskUsage;
    }

    /**
     * Set diskUsageLastUpdated
     *
     * @param \DateTime $diskUsageLastUpdated
     * @return Resource
     */
    public function setDiskUsageLastUpdated($diskUsageLastUpdated)
    {
        $this->diskUsageLastUpdated = $diskUsageLastUpdated;

        return $this;
    }

    /**
     * Get diskUsageLastUpdated
     *
     * @return \DateTime 
     */
    public function getDiskUsageLastUpdated()
    {
        return $this->diskUsageLastUpdated;
    }

    /**
     * Set fileSize
     *
     * @param integer $fileSize
     * @return Resource
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
     * Set previewAttempts
     *
     * @param integer $previewAttempts
     * @return Resource
     */
    public function setPreviewAttempts($previewAttempts)
    {
        $this->previewAttempts = $previewAttempts;

        return $this;
    }

    /**
     * Get previewAttempts
     *
     * @return integer 
     */
    public function getPreviewAttempts()
    {
        return $this->previewAttempts;
    }

    /**
     * Set field12
     *
     * @param string $field12
     * @return Resource
     */
    public function setField12($field12)
    {
        $this->field12 = $field12;

        return $this;
    }

    /**
     * Get field12
     *
     * @return string 
     */
    public function getField12()
    {
        return $this->field12;
    }

    /**
     * Set field8
     *
     * @param string $field8
     * @return Resource
     */
    public function setField8($field8)
    {
        $this->field8 = $field8;

        return $this;
    }

    /**
     * Get field8
     *
     * @return string 
     */
    public function getField8()
    {
        return $this->field8;
    }

    /**
     * Set field3
     *
     * @param string $field3
     * @return Resource
     */
    public function setField3($field3)
    {
        $this->field3 = $field3;

        return $this;
    }

    /**
     * Get field3
     *
     * @return string 
     */
    public function getField3()
    {
        return $this->field3;
    }
}
