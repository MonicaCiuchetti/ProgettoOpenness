<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Log
 *
 * @ORM\Table(name="log")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\LogRepository")
 */
class Log
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="logTime", type="datetime")
     */
    private $logTime;

    /**
     * @var string
     *
     * @ORM\Column(name="logDescription", type="string", length=30)
     */
    private $logDescription;

    /**
     * @var int
     *
     * @ORM\Column(name="User_id", type="integer")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="logs")
     * @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     */
    private $user;

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
     * Set logTime
     *
     * @param \DateTime $logTime
     * @return Log
     */
    public function setLogTime($logTime)
    {
        $this->logTime = $logTime;

        return $this;
    }

    /**
     * Get logTime
     *
     * @return \DateTime
     */
    public function getLogTime()
    {
        return $this->logTime;
    }

    /**
     * Set logDescription
     *
     * @param string $logDescription
     * @return Log
     */
    public function setLogDescription($logDescription)
    {
        $this->logDescription = $logDescription;

        return $this;
    }

    /**
     * Get logDescription
     *
     * @return string
     */
    public function getLogDescription()
    {
        return $this->logDescription;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Log
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return Log
     */
    public function setUser(\AppBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }
}
