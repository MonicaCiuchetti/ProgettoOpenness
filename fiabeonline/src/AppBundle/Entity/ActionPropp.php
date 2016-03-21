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
     * @ORM\JoinColumn(name="SequenceType_id", referencedColumnName="id")
     */
    private $sequenceTypeId;

    /**
     * @ORM\ManyToOne(targetEntity="CardType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="CardType_id", referencedColumnName="id")
     */
    private $cardTypeId;

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
     * Set sequenceTypeId
     *
     * @param \AppBundle\Entity\SequenceType $sequenceTypeId
     * @return ActionPropp
     */
    public function setSequenceTypeId(\AppBundle\Entity\SequenceType $sequenceTypeId = null)
    {
        $this->sequenceTypeId = $sequenceTypeId;

        return $this;
    }

    /**
     * Get sequenceTypeId
     *
     * @return \AppBundle\Entity\SequenceType 
     */
    public function getSequenceTypeId()
    {
        return $this->sequenceTypeId;
    }

    /**
     * Set cardTypeId
     *
     * @param \AppBundle\Entity\CardType $cardTypeId
     * @return ActionPropp
     */
    public function setCardTypeId(\AppBundle\Entity\CardType $cardTypeId = null)
    {
        $this->cardTypeId = $cardTypeId;

        return $this;
    }

    /**
     * Get cardTypeId
     *
     * @return \AppBundle\Entity\CardType 
     */
    public function getCardTypeId()
    {
        return $this->cardTypeId;
    }
}
