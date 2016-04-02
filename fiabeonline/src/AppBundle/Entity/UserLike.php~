<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserLike
 *
 * @ORM\Table(name="userlike")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\UserLikeRepository")
 */
class UserLike
{
    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="User", inversedBy="likes")
     * @ORM\JoinColumn(name="user", referencedColumnName="id", onDelete="CASCADE")
     */
    private $user;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Tale", inversedBy="likes")
     * @ORM\JoinColumn(name="tale", referencedColumnName="id", onDelete="CASCADE")
     */
    private $tale;

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     * @return UserLike
     */
    public function setUserId(\AppBundle\Entity\User $userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set taleId
     *
     * @param \AppBundle\Entity\Tale $taleId
     * @return UserLike
     */
    public function setTaleId(\AppBundle\Entity\Tale $taleId)
    {
        $this->taleId = $taleId;

        return $this;
    }

    /**
     * Get taleId
     *
     * @return \AppBundle\Entity\Tale
     */
    public function getTaleId()
    {
        return $this->taleId;
    }

    /**
     * Set user
     *
     * @param \AppBundle\Entity\User $user
     * @return UserLike
     */
    public function setUser(\AppBundle\Entity\User $user)
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

    /**
     * Set tale
     *
     * @param \AppBundle\Entity\Tale $tale
     * @return UserLike
     */
    public function setTale(\AppBundle\Entity\Tale $tale)
    {
        $this->tale = $tale;

        return $this;
    }

    /**
     * Get tale
     *
     * @return \AppBundle\Entity\Tale 
     */
    public function getTale()
    {
        return $this->tale;
    }
}
