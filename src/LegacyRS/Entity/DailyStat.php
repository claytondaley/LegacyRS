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
 * DailyStat
 *
 * @ORM\Table(name="daily_stat", indexes={@ORM\Index(name="stat_day", columns={"year", "month", "day"}), @ORM\Index(name="stat_month", columns={"year", "month"}), @ORM\Index(name="stat_usergroup", columns={"usergroup"}), @ORM\Index(name="stat_day_activity", columns={"year", "month", "day", "activity_type"}), @ORM\Index(name="stat_day_activity_ref", columns={"year", "month", "day", "activity_type", "object_ref"})})
 * @ORM\Entity
 */
class DailyStat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="year", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $year = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="month", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $month = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="day", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $day = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="usergroup", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $usergroup = '0';

    /**
     * @var string
     *
     * @ORM\Column(name="activity_type", type="string", length=50, nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $activityType = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="object_ref", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $objectRef = '0';

    /**
     * @var integer
     *
     * @ORM\Column(name="count", type="integer", nullable=true)
     */
    private $count = '0';



    /**
     * Set year
     *
     * @param integer $year
     * @return DailyStat
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get year
     *
     * @return integer 
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set month
     *
     * @param integer $month
     * @return DailyStat
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get month
     *
     * @return integer 
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set day
     *
     * @param integer $day
     * @return DailyStat
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get day
     *
     * @return integer 
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set usergroup
     *
     * @param integer $usergroup
     * @return DailyStat
     */
    public function setUsergroup($usergroup)
    {
        $this->usergroup = $usergroup;

        return $this;
    }

    /**
     * Get usergroup
     *
     * @return integer 
     */
    public function getUsergroup()
    {
        return $this->usergroup;
    }

    /**
     * Set activityType
     *
     * @param string $activityType
     * @return DailyStat
     */
    public function setActivityType($activityType)
    {
        $this->activityType = $activityType;

        return $this;
    }

    /**
     * Get activityType
     *
     * @return string 
     */
    public function getActivityType()
    {
        return $this->activityType;
    }

    /**
     * Set objectRef
     *
     * @param integer $objectRef
     * @return DailyStat
     */
    public function setObjectRef($objectRef)
    {
        $this->objectRef = $objectRef;

        return $this;
    }

    /**
     * Get objectRef
     *
     * @return integer 
     */
    public function getObjectRef()
    {
        return $this->objectRef;
    }

    /**
     * Set count
     *
     * @param integer $count
     * @return DailyStat
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
    }

    /**
     * Get count
     *
     * @return integer 
     */
    public function getCount()
    {
        return $this->count;
    }
}
