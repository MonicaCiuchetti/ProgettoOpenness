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
     * @var string
     *
     * @ORM\Column(name="actTypePropp", type="string", length=2, options={"fixed" = true})
     */
    private $actTypePropp;

    /**
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="sequenceType", referencedColumnName="id")
     */
    private $sequenceType;

    /**
     * @ORM\ManyToOne(targetEntity="CardType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="cardType", referencedColumnName="id")
     */
    private $cardType;

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
     * Set actTypePropp
     *
     * @param string $actTypePropp
     * @return ActionPropp
     */
    public function setActTypePropp($actTypePropp)
    {
        $this->actTypePropp = $actTypePropp;

        return $this;
    }

    /**
     * Get actTypePropp
     *
     * @return string 
     */
    public function getActTypePropp()
    {
        return $this->actTypePropp;
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
}
