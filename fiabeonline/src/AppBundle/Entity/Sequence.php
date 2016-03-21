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
     * @ORM\ManyToOne(targetEntity="Tale", inversedBy="sequences")
     * @ORM\JoinColumn(name="Tale_id", referencedColumnName="id")
     */
    private $taleId;

    /**
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="sequences")
     * @ORM\JoinColumn(name="SequenceType_id", referencedColumnName="id")
     */
    private $sequenceTypeId;

    /**
     * @ORM\OneToMany(targetEntity="Action", mappedBy="sequenceId")
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
     * @param \AppBundle\Entity\Tale $taleId
     * @return Sequence
     */
    public function setTaleId(\AppBundle\Entity\Tale $taleId = null)
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
     * Set sequenceTypeId
     *
     * @param \AppBundle\Entity\SequenceType $sequenceTypeId
     * @return Sequence
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
     * Add actions
     *
     * @param \AppBundle\Entity\Action $actions
     * @return Sequence
     */
    public function addAction(\AppBundle\Entity\Action $actions)
    {
        $this->actions[] = $actions;

        return $this;
    }

    /**
     * Remove actions
     *
     * @param \AppBundle\Entity\Action $actions
     */
    public function removeAction(\AppBundle\Entity\Action $actions)
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
