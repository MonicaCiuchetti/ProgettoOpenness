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
     * @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     */
    protected $userId;

    /**
     * @var int
     *
     * @ORM\Id
     * @ORM\ManyToOne(targetEntity="Tale", inversedBy="likes")
     * @ORM\JoinColumn(name="Tale_id", referencedColumnName="id")
     */
    protected $taleId;

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
     * Get taleId
     *
     * @return \AppBundle\Entity\Tale
     */
    public function getTaleId()
    {
        return $this->taleId;
    }

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
}
