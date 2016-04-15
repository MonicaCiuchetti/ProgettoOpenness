<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SequenceType
 *
 * @ORM\Table(name="sequencetype")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\SequenceTypeRepository")
 */
class SequenceType
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
     * @ORM\Column(name="stName", type="string", length=50)
     */
    private $stName;

    /**
     * @var string
     *
     * @ORM\Column(name="stDescription", type="string", length=250, nullable=true)
     */
    private $stDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="stColor", type="string", length=7)
     */
    private $stColor;

    /**
     * @ORM\OneToMany(targetEntity="ActionPropp", mappedBy="sequenceType")
     */
    private $actionsPropp;

    /**
     * @ORM\OneToMany(targetEntity="Sequence", mappedBy="sequenceType")
     */
    private $sequences;

    public function __construct()
    {
        $this->sequences = new ArrayCollection();
        $this->actionsPropp = new ArrayCollection();
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
     * Set stName
     *
     * @param string $stName
     * @return SequenceType
     */
    public function setStName($stName)
    {
        $this->stName = $stName;

        return $this;
    }

    /**
     * Get stName
     *
     * @return string 
     */
    public function getStName()
    {
        return $this->stName;
    }

    /**
     * Set stDescription
     *
     * @param string $stDescription
     * @return SequenceType
     */
    public function setStDescription($stDescription)
    {
        $this->stDescription = $stDescription;

        return $this;
    }

    /**
     * Get stDescription
     *
     * @return string 
     */
    public function getStDescription()
    {
        return $this->stDescription;
    }

    /**
     * Set stColor
     *
     * @param string $stColor
     * @return SequenceType
     */
    public function setStColor($stColor)
    {
        $this->stColor = $stColor;

        return $this;
    }

    /**
     * Get stColor
     *
     * @return string 
     */
    public function getStColor()
    {
        return $this->stColor;
    }

    /**
     * Add actionsPropp
     *
     * @param \AppBundle\Entity\ActionPropp $actionsPropp
     * @return SequenceType
     */
    public function addActionsPropp(\AppBundle\Entity\ActionPropp $actionsPropp)
    {
        $this->actionsPropp[] = $actionsPropp;

        return $this;
    }

    /**
     * Remove actionsPropp
     *
     * @param \AppBundle\Entity\ActionPropp $actionsPropp
     */
    public function removeActionsPropp(\AppBundle\Entity\ActionPropp $actionsPropp)
    {
        $this->actionsPropp->removeElement($actionsPropp);
    }

    /**
     * Get actionsPropp
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getActionsPropp()
    {
        return $this->actionsPropp;
    }

    /**
     * Add sequences
     *
     * @param \AppBundle\Entity\Sequence $sequences
     * @return SequenceType
     */
    public function addSequence(\AppBundle\Entity\Sequence $sequences)
    {
        $this->sequences[] = $sequences;

        return $this;
    }

    /**
     * Remove sequences
     *
     * @param \AppBundle\Entity\Sequence $sequences
     */
    public function removeSequence(\AppBundle\Entity\Sequence $sequences)
    {
        $this->sequences->removeElement($sequences);
    }

    /**
     * Get sequences
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSequences()
    {
        return $this->sequences;
    }
}
