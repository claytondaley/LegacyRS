<?php

namespace LegacyRS\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReportPeriodicEmails
 *
 * @ORM\Table(name="report_periodic_emails")
 * @ORM\Entity
 */
class ReportPeriodicEmails
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
     * @ORM\Column(name="user", type="integer", nullable=true)
     */
    private $user;

    /**
     * @var integer
     *
     * @ORM\Column(name="send_all_users", type="integer", nullable=true)
     */
    private $sendAllUsers;

    /**
     * @var integer
     *
     * @ORM\Column(name="report", type="integer", nullable=true)
     */
    private $report;

    /**
     * @var integer
     *
     * @ORM\Column(name="period", type="integer", nullable=true)
     */
    private $period;

    /**
     * @var integer
     *
     * @ORM\Column(name="email_days", type="integer", nullable=true)
     */
    private $emailDays;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="last_sent", type="datetime", nullable=true)
     */
    private $lastSent;



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
     * Set user
     *
     * @param integer $user
     * @return ReportPeriodicEmails
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
     * Set sendAllUsers
     *
     * @param integer $sendAllUsers
     * @return ReportPeriodicEmails
     */
    public function setSendAllUsers($sendAllUsers)
    {
        $this->sendAllUsers = $sendAllUsers;

        return $this;
    }

    /**
     * Get sendAllUsers
     *
     * @return integer 
     */
    public function getSendAllUsers()
    {
        return $this->sendAllUsers;
    }

    /**
     * Set report
     *
     * @param integer $report
     * @return ReportPeriodicEmails
     */
    public function setReport($report)
    {
        $this->report = $report;

        return $this;
    }

    /**
     * Get report
     *
     * @return integer 
     */
    public function getReport()
    {
        return $this->report;
    }

    /**
     * Set period
     *
     * @param integer $period
     * @return ReportPeriodicEmails
     */
    public function setPeriod($period)
    {
        $this->period = $period;

        return $this;
    }

    /**
     * Get period
     *
     * @return integer 
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * Set emailDays
     *
     * @param integer $emailDays
     * @return ReportPeriodicEmails
     */
    public function setEmailDays($emailDays)
    {
        $this->emailDays = $emailDays;

        return $this;
    }

    /**
     * Get emailDays
     *
     * @return integer 
     */
    public function getEmailDays()
    {
        return $this->emailDays;
    }

    /**
     * Set lastSent
     *
     * @param \DateTime $lastSent
     * @return ReportPeriodicEmails
     */
    public function setLastSent($lastSent)
    {
        $this->lastSent = $lastSent;

        return $this;
    }

    /**
     * Get lastSent
     *
     * @return \DateTime 
     */
    public function getLastSent()
    {
        return $this->lastSent;
    }
}
