<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Tale
 *
 * @ORM\Table(name="tale")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaleRepository")
 */
class Tale
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
     * @ORM\Column(name="taleTitle", type="string", length=30)
     */
    private $taleTitle;

    /**
     * @var string
     *
     * @ORM\Column(name="taleAuthor", type="string", length=30, nullable=true)
     */
    private $taleAuthor;

    /**
     * @var string
     *
     * @ORM\Column(name="taleVersion", type="string", length=15, nullable=true)
     */
    private $taleVersion;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="taleDate", type="datetime")
     */
    private $taleDate;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="taleUpdate", type="datetime", nullable=true)
     */
    private $taleUpdate;

    /**
     * @var string
     *
     * @ORM\Column(name="taleNotes", type="string", length=30, nullable=true)
     */
    private $taleNotes;

    /**
     * @var int
     *
     * @ORM\Column(name="taleScore", type="integer")
     */
    private $taleScore;

    /**
     * @ORM\ManyToOne(targetEntity="User", inversedBy="tales")
     * @ORM\JoinColumn(name="User_id", referencedColumnName="id")
     */
    private $userId;

    /**
     * @ORM\ManyToOne(targetEntity="Type", inversedBy="tales")
     * @ORM\JoinColumn(name="Type_id", referencedColumnName="id")
     */
    private $typeId;

    /**
     * @ORM\OneToMany(targetEntity="UserLike", mappedBy="taleId")
     */
    private $likes;

    /**
     * @ORM\OneToMany(targetEntity="TaleGenre", mappedBy="taleId")
     */
    protected $taleGenres;

    /**
     * @ORM\OneToMany(targetEntity="Sequence", mappedBy="taleId")
     */
    protected $sequences;

    public function __construct()
    {
        $this->likes = new ArrayCollection();
        $this->taleGenres = new ArrayCollection();
        $this->sequences = new ArrayCollection();
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
     * Set taleTitle
     *
     * @param string $taleTitle
     * @return Tale
     */
    public function setTaleTitle($taleTitle)
    {
        $this->taleTitle = $taleTitle;

        return $this;
    }

    /**
     * Get taleTitle
     *
     * @return string 
     */
    public function getTaleTitle()
    {
        return $this->taleTitle;
    }

    /**
     * Set taleAuthor
     *
     * @param string $taleAuthor
     * @return Tale
     */
    public function setTaleAuthor($taleAuthor)
    {
        $this->taleAuthor = $taleAuthor;

        return $this;
    }

    /**
     * Get taleAuthor
     *
     * @return string 
     */
    public function getTaleAuthor()
    {
        return $this->taleAuthor;
    }

    /**
     * Set taleVersion
     *
     * @param string $taleVersion
     * @return Tale
     */
    public function setTaleVersion($taleVersion)
    {
        $this->taleVersion = $taleVersion;

        return $this;
    }

    /**
     * Get taleVersion
     *
     * @return string 
     */
    public function getTaleVersion()
    {
        return $this->taleVersion;
    }

    /**
     * Set taleDate
     *
     * @param \DateTime $taleDate
     * @return Tale
     */
    public function setTaleDate($taleDate)
    {
        $this->taleDate = $taleDate;

        return $this;
    }

    /**
     * Get taleDate
     *
     * @return \DateTime 
     */
    public function getTaleDate()
    {
        return $this->taleDate;
    }

    /**
     * Set taleUpdate
     *
     * @param \DateTime $taleUpdate
     * @return Tale
     */
    public function setTaleUpdate($taleUpdate)
    {
        $this->taleUpdate = $taleUpdate;

        return $this;
    }

    /**
     * Get taleUpdate
     *
     * @return \DateTime 
     */
    public function getTaleUpdate()
    {
        return $this->taleUpdate;
    }

    /**
     * Set taleNotes
     *
     * @param string $taleNotes
     * @return Tale
     */
    public function setTaleNotes($taleNotes)
    {
        $this->taleNotes = $taleNotes;

        return $this;
    }

    /**
     * Get taleNotes
     *
     * @return string 
     */
    public function getTaleNotes()
    {
        return $this->taleNotes;
    }

    /**
     * Set taleScore
     *
     * @param integer $taleScore
     * @return Tale
     */
    public function setTaleScore($taleScore)
    {
        $this->taleScore = $taleScore;

        return $this;
    }

    /**
     * Get taleScore
     *
     * @return integer 
     */
    public function getTaleScore()
    {
        return $this->taleScore;
    }

    /**
     * Set userId
     *
     * @param \AppBundle\Entity\User $userId
     * @return Tale
     */
    public function setUserId(\AppBundle\Entity\User $userId = null)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return \AppBundle\Entity\User 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set typeId
     *
     * @param \AppBundle\Entity\Type $typeId
     * @return Tale
     */
    public function setTypeId(\AppBundle\Entity\Type $typeId = null)
    {
        $this->typeId = $typeId;

        return $this;
    }

    /**
     * Get typeId
     *
     * @return \AppBundle\Entity\Type 
     */
    public function getTypeId()
    {
        return $this->typeId;
    }

    /**
     * Add likes
     *
     * @param \AppBundle\Entity\UserLike $likes
     * @return Tale
     */
    public function addLike(\AppBundle\Entity\UserLike $likes)
    {
        $this->likes[] = $likes;

        return $this;
    }

    /**
     * Remove likes
     *
     * @param \AppBundle\Entity\UserLike $likes
     */
    public function removeLike(\AppBundle\Entity\UserLike $likes)
    {
        $this->likes->removeElement($likes);
    }

    /**
     * Get likes
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getLikes()
    {
        return $this->likes;
    }

    /**
     * Add taleGenres
     *
     * @param \AppBundle\Entity\TaleGenre $taleGenres
     * @return Tale
     */
    public function addTaleGenre(\AppBundle\Entity\TaleGenre $taleGenres)
    {
        $this->taleGenres[] = $taleGenres;

        return $this;
    }

    /**
     * Remove taleGenres
     *
     * @param \AppBundle\Entity\TaleGenre $taleGenres
     */
    public function removeTaleGenre(\AppBundle\Entity\TaleGenre $taleGenres)
    {
        $this->taleGenres->removeElement($taleGenres);
    }

    /**
     * Get taleGenres
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTaleGenres()
    {
        return $this->taleGenres;
    }

    /**
     * Add sequences
     *
     * @param \AppBundle\Entity\Sequence $sequences
     * @return Tale
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
