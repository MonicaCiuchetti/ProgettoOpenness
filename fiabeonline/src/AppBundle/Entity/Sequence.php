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
     * @ORM\JoinColumn(name="tale", referencedColumnName="id", onDelete="CASCADE")
     */
    private $tale;

    /**
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="sequences")
     * @ORM\JoinColumn(name="sequenceType", referencedColumnName="id")
     */
    private $sequenceType;

    /**
     * @ORM\OneToMany(targetEntity="Action", mappedBy="sequence", orphanRemoval=true)
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
     * Set tale
     *
     * @param \AppBundle\Entity\Tale $tale
     * @return Sequence
     */
    public function setTale(\AppBundle\Entity\Tale $tale = null)
    {
        $this->tale = $tale;

        return $this;
    }

    /**
     * Get tale
     *
     * @return \AppBundle\Entity\Tale 
     */
    public function getTale()
    {
        return $this->tale;
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
