<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sequence
 *
 * @ORM\Table(name="sequence")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SequenceRepository")
 */
class Sequence
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
     * @ORM\Column(name="seqText", type="text")
     */
    private $seqText;

    /**
     * @var int
     *
     * @ORM\Column(name="seqOrder", type="integer")
     */
    private $seqOrder;

    /**
     * @var int
     *
     * @ORM\Column(name="Tale_id", type="integer")
     */
    private $taleId;

    /**
     * @var int
     *
     * @ORM\Column(name="SequenceType_id", type="integer")
     */
    private $sequenceTypeId;

    /**
     * @ORM\ManyToOne(targetEntity="Tale", inversedBy="sequences")
     * @ORM\JoinColumn(name="Tale_id", referencedColumnName="id")
     */
    protected $user;

    /**
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="sequences")
     * @ORM\JoinColumn(name="SequenceType_id", referencedColumnName="id")
     */
    protected $sequenceType;

    /**
     * @ORM\OneToMany(targetEntity="Action", mappedBy="Sequence_id")
     */
    private $actions;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
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
     * Set seqText
     *
     * @param string $seqText
     * @return Sequence
     */
    public function setSeqText($seqText)
    {
        $this->seqText = $seqText;

        return $this;
    }

    /**
     * Get seqText
     *
     * @return string
     */
    public function getSeqText()
    {
        return $this->seqText;
    }

    /**
     * Set seqOrder
     *
     * @param integer $seqOrder
     * @return Sequence
     */
    public function setSeqOrder($seqOrder)
    {
        $this->seqOrder = $seqOrder;

        return $this;
    }

    /**
     * Get seqOrder
     *
     * @return integer
     */
    public function getSeqOrder()
    {
        return $this->seqOrder;
    }

    /**
     * Set taleId
     *
     * @param integer $taleId
     * @return Sequence
     */
    public function setTaleId($taleId)
    {
        $this->taleId = $taleId;

        return $this;
    }

    /**
     * Get taleId
     *
     * @return integer
     */
    public function getTaleId()
    {
        return $this->taleId;
    }

    /**
     * Set sequenceTypeId
     *
     * @param integer $sequenceTypeId
     * @return Sequence
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
     * Set user
     *
     * @param \AppBundle\Entity\Tale $user
     * @return Sequence
     */
    public function setUser(\AppBundle\Entity\Tale $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \AppBundle\Entity\Tale
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set sequenceType
     *
     * @param \AppBundle\Entity\SequenceType $sequenceType
     * @return Sequence
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
     * Add actions
     *
     * @param \AppBundle\Entity\Log $actions
     * @return Sequence
     */
    public function addAction(\AppBundle\Entity\Log $actions)
    {
        $this->actions[] = $actions;

        return $this;
    }

    /**
     * Remove actions
     *
     * @param \AppBundle\Entity\Log $actions
     */
    public function removeAction(\AppBundle\Entity\Log $actions)
    {
        $this->actions->removeElement($actions);
    }

    /**
     * Get actions
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActions()
    {
        return $this->actions;
    }
}
