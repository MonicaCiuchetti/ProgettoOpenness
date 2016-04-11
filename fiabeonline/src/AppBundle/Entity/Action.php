<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Action
 *
 * @ORM\Table(name="action")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActionRepository")
 */
class Action
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
     * @ORM\ManyToOne(targetEntity="Sequence", inversedBy="actions")
     * @ORM\JoinColumn(name="sequence", referencedColumnName="id", onDelete="CASCADE")
     */
    private $sequence;

    /**
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="actions")
     * @ORM\JoinColumn(name="card", referencedColumnName="id")
     */
    private $card;

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
     * Set actType
     *
     * @param string $actType
     * @return Action
     */
    public function setActType($actType)
    {
        $this->actType = $actType;

        return $this;
    }

    /**
     * Get actType
     *
     * @return string 
     */
    public function getActType()
    {
        return $this->actType;
    }

    /**
     * Set sequence
     *
     * @param \AppBundle\Entity\Sequence $sequence
     * @return Action
     */
    public function setSequence(\AppBundle\Entity\Sequence $sequence = null)
    {
        $this->sequence = $sequence;

        return $this;
    }

    /**
     * Get sequence
     *
     * @return \AppBundle\Entity\Sequence 
     */
    public function getSequence()
    {
        return $this->sequence;
    }

    /**
     * Set card
     *
     * @param \AppBundle\Entity\Card $card
     * @return Action
     */
    public function setCard(\AppBundle\Entity\Card $card = null)
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
}
