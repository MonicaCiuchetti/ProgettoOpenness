<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionPropp
 *
 * @ORM\Table(name="actionpropp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActionProppRepository")
 */
class ActionPropp
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
     * @var int
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @ORM\ManyToOne(targetEntity="CardType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="cardType", referencedColumnName="id")
     */
    private $cardType;

    /**
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="sequenceType", referencedColumnName="id")
     */
    private $sequenceType;

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
     * Set score
     *
     * @param integer $score
     * @return ActionPropp
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
     * Set cardType
     *
     * @param \AppBundle\Entity\CardType $cardType
     * @return ActionPropp
     */
    public function setCardType(\AppBundle\Entity\CardType $cardType = null)
    {
        $this->cardType = $cardType;

        return $this;
    }

    /**
     * Get cardType
     *
     * @return \AppBundle\Entity\CardType 
     */
    public function getCardType()
    {
        return $this->cardType;
    }

    /**
     * Set sequenceType
     *
     * @param \AppBundle\Entity\SequenceType $sequenceType
     * @return ActionPropp
     */
    public function setSequenceType(\AppBundle\Entity\SequenceType $sequenceType = null)
    {
        $this->sequenceType = $sequenceType;

        return $this;
    }

    /**
     * Get sequenceType
     *
     * @return \AppBundle\Entity\SequenceType 
     */
    public function getSequenceType()
    {
        return $this->sequenceType;
    }
}
