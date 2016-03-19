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
     * @var int
     *
     * @ORM\Column(name="SequenceType_id", type="integer")
     */
    private $sequenceTypeId;

    /**
     * @var int
     *
     * @ORM\Column(name="CardType_id", type="integer")
     */
    private $cardTypeId;

    /**
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="SequenceType_id", referencedColumnName="id")
     */
    protected $sequenceType;

    /**
     * @ORM\ManyToOne(targetEntity="CardType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="CardType_id", referencedColumnName="id")
     */
    protected $cardType;

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
     * @param integer $sequenceTypeId
     * @return ActionPropp
     */
    public function setSequenceTypeId($sequenceTypeId)
    {
        $this->sequenceTypeId = $sequenceTypeId;

        return $this;
    }

    /**
     * Get sequenceTypeId
     *
     * @return integer
     */
    public function getSequenceTypeId()
    {
        return $this->sequenceTypeId;
    }

    /**
     * Set cardTypeId
     *
     * @param integer $cardTypeId
     * @return ActionPropp
     */
    public function setCardTypeId($cardTypeId)
    {
        $this->cardTypeId = $cardTypeId;

        return $this;
    }

    /**
     * Get cardTypeId
     *
     * @return integer
     */
    public function getCardTypeId()
    {
        return $this->cardTypeId;
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
