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
     * @var string
     *
     * @ORM\Column(name="actType", type="string", length=2, options={"fixed" = true})
     */
    private $actType;

    /**
     * @ORM\ManyToOne(targetEntity="Sequence", inversedBy="actions")
     * @ORM\JoinColumn(name="Sequence_id", referencedColumnName="id")
     */
    private $sequenceId;

    /**
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="actions")
     * @ORM\JoinColumn(name="Card_id", referencedColumnName="id")
     */
    private $cardId;

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
     * Set sequenceId
     *
     * @param \AppBundle\Entity\Sequence $sequenceId
     * @return Action
     */
    public function setSequenceId(\AppBundle\Entity\Sequence $sequenceId = null)
    {
        $this->sequenceId = $sequenceId;

        return $this;
    }

    /**
     * Get sequenceId
     *
     * @return \AppBundle\Entity\Sequence 
     */
    public function getSequenceId()
    {
        return $this->sequenceId;
    }

    /**
     * Set cardId
     *
     * @param \AppBundle\Entity\Card $cardId
     * @return Action
     */
    public function setCardId(\AppBundle\Entity\Card $cardId = null)
    {
        $this->cardId = $cardId;

        return $this;
    }

    /**
     * Get cardId
     *
     * @return \AppBundle\Entity\Card 
     */
    public function getCardId()
    {
        return $this->cardId;
    }
}
