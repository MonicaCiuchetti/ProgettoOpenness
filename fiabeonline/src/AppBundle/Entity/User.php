<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="`user`")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO") 
     */
    protected $id;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="birthday", type="date")
     */
    protected $birthday;

    /**
     * @var int
     *
     * @ORM\Column(name="level", type="integer")
     */
    protected $level;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer")
     */
    protected $score;

    /**
     * @var bool
     *
     * @ORM\Column(name="isActive", type="boolean")
     */

    protected $isActive;

    /**
     * @ORM\OneToMany(targetEntity="Log", mappedBy="user", orphanRemoval=true)
     */
    protected $logs;

    /**
     * @ORM\OneToMany(targetEntity="UserLike", mappedBy="user", orphanRemoval=true)
     */
    protected $likes;

    /**
     * @ORM\OneToMany(targetEntity="Tale", mappedBy="user", orphanRemoval=true)
     */
    protected $tales;

    public function __construct()
    {
        parent::__construct();
        $this->isActive = true;
        $this->logs = new ArrayCollection();
        $this->likes = new ArrayCollection();
        $this->tales = new ArrayCollection();
    }

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
     * Set isActive
     *
     * @param boolean $isActive
     * @return User
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

   
     /**
     * Set level
     *
     * @param integer $level
     * @return User
     */
    public function setLevel($level)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get level
     *
     * @return integer
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set score
     *
     * @param integer $score
     * @return User
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set birthday
     *
     * @param \DateTime $birthday
     * @return User
     */
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    /**
     * Get birthday
     *
     * @return \DateTime
     */
    public function getBirthday()
    {
        return $this->birthday;
    }

    /**
     * Add logs
     *
     * @param \AppBundle\Entity\Log $logs
     * @return User
     */
    public function addLog(\AppBundle\Entity\Log $logs)
    {
        $this->logs[] = $logs;

        return $this;
    }

    /**
     * Remove logs
     *
     * @param \AppBundle\Entity\Log $logs
     */
    public function removeLog(\AppBundle\Entity\Log $logs)
    {
        $this->logs->removeElement($logs);
    }

    /**
     * Get logs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLogs()
    {
        return $this->logs;
    }

    /**
     * Add likes
     *
     * @param \AppBundle\Entity\UserLike $likes
     * @return User
     */
    public function addLike(\AppBundle\Entity\UserLike $likes)
    {
        $this->likes[] = $likes;

        return $this;
    }

    /**
     * Remove likes
     *
     * @param \AppBundle\Entity\UserLike $likes
     */
    public function removeLike(\AppBundle\Entity\UserLike $likes)
    {
        $this->likes->removeElement($likes);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Add tales
     *
     * @param \AppBundle\Entity\Tale $tales
     * @return User
     */
    public function addTale(\AppBundle\Entity\Tale $tales)
    {
        $this->tales[] = $tales;

        return $this;
    }

    /**
     * Remove tales
     *
     * @param \AppBundle\Entity\Tale $tales
     */
    public function removeTale(\AppBundle\Entity\Tale $tales)
    {
        $this->tales->removeElement($tales);
    }

    /**
     * Get tales
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTales()
    {
        return $this->tales;
    }

  
}
