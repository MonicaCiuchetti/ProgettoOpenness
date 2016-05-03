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
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="card", referencedColumnName="id")
     */
    private $card;

    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="sequenceType", referencedColumnName="id")
     */
    private $sequenceType;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", options={"default" = 5})
     */
    private $score;

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
     * Set card
     *
     * @param \AppBundle\Entity\Card $card
     * @return ActionPropp
     */
    public function setCard(\AppBundle\Entity\Card $card)
    {
        $this->card = $card;

        return $this;
    }

    /**
     * Get card
     *
     * @return \AppBundle\Entity\Card 
     */
    public function getCard()
    {
        return $this->card;
    }

    /**
     * Set sequenceType
     *
     * @param \AppBundle\Entity\SequenceType $sequenceType
     * @return ActionPropp
     */
    public function setSequenceType(\AppBundle\Entity\SequenceType $sequenceType)
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
