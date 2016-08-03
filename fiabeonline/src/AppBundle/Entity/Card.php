<?php
namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Card
 *
 * @ORM\Table(name="card")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CardRepository")
 */
class Card
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
     * @ORM\Column(name="cardName", type="string", length=50)
     */
    private $cardName;

    /**
     * @var string
     *
     * @ORM\Column(name="cardDescription", type="string", length=250, nullable=true)
     */
    private $cardDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="cardText", type="text", nullable=true)
     */
    private $cardText;

    /**
     * @var string
     *
     * @ORM\Column(name="cardFront", type="string", length=50)
     */
    private $cardFront;

    /**
     * @ORM\ManyToOne(targetEntity="CardType", inversedBy="cards")
     * @ORM\JoinColumn(name="cardType", referencedColumnName="id")
     */
    private $cardType;

    /**
     * @ORM\OneToMany(targetEntity="Action", mappedBy="card")
     */
    private $actions;

    /**
     * @ORM\OneToMany(targetEntity="ActionPropp", mappedBy="cardType")
     */
    private $actionsPropp;

    /**
     * @ORM\OneToMany(targetEntity="Partecipation", mappedBy="character")
     */
    private $partecipations;

    /**
     * @ORM\OneToMany(targetEntity="PartecipationDefault", mappedBy="character")
     */
    private $partecipationsDefault;

    public function __construct()
    {
        $this->actions = new ArrayCollection();
        $this->actionsPropp = new ArrayCollection();
        $this->partecipations = new ArrayCollection();
        $this->partecipationsDefault = new ArrayCollection();
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
     * Set cardName
     *
     * @param string $cardName
     * @return Card
     */
    public function setCardName($cardName)
    {
        $this->cardName = $cardName;

        return $this;
    }

    /**
     * Get cardName
     *
     * @return string
     */
    public function getCardName()
    {
        return $this->cardName;
    }

    /**
     * Set cardDescription
     *
     * @param string $cardDescription
     * @return Card
     */
    public function setCardDescription($cardDescription)
    {
        $this->cardDescription = $cardDescription;

        return $this;
    }

    /**
     * Get cardDescription
     *
     * @return string
     */
    public function getCardDescription()
    {
        return $this->cardDescription;
    }

    /**
     * Set cardFront
     *
     * @param string $cardFront
     * @return Card
     */
    public function setCardFront($cardFront)
    {
        $this->cardFront = $cardFront;

        return $this;
    }

    /**
     * Get cardFront
     *
     * @return string
     */
    public function getCardFront()
    {
        return $this->cardFront;
    }

    /**
     * Set cardType
     *
     * @param \AppBundle\Entity\CardType $cardType
     * @return Card
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

    /**
     * Add actions
     *
     * @param \AppBundle\Entity\Action $actions
     * @return Card
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

    /**
     * Add actionsPropp
     *
     * @param \AppBundle\Entity\ActionPropp $actionsPropp
     * @return Card
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
     * Add partecipations
     *
     * @param \AppBundle\Entity\Partecipation $partecipations
     * @return Card
     */
    public function addPartecipation(\AppBundle\Entity\Partecipation $partecipations)
    {
        $this->partecipations[] = $partecipations;

        return $this;
    }

    /**
     * Remove partecipations
     *
     * @param \AppBundle\Entity\Partecipation $partecipations
     */
    public function removePartecipation(\AppBundle\Entity\Partecipation $partecipations)
    {
        $this->partecipations->removeElement($partecipations);
    }

    /**
     * Get partecipations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartecipations()
    {
        return $this->partecipations;
    }

    /**
     * Add partecipationsDefault
     *
     * @param \AppBundle\Entity\PartecipationDefault $partecipationsDefault
     * @return Card
     */
    public function addPartecipationsDefault(\AppBundle\Entity\PartecipationDefault $partecipationsDefault)
    {
        $this->partecipationsDefault[] = $partecipationsDefault;

        return $this;
    }

    /**
     * Remove partecipationsDefault
     *
     * @param \AppBundle\Entity\PartecipationDefault $partecipationsDefault
     */
    public function removePartecipationsDefault(\AppBundle\Entity\PartecipationDefault $partecipationsDefault)
    {
        $this->partecipationsDefault->removeElement($partecipationsDefault);
    }

    /**
     * Get partecipationsDefault
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPartecipationsDefault()
    {
        return $this->partecipationsDefault;
    }

    /**
     * Set cardText
     *
     * @param string $cardText
     * @return Card
     */
    public function setCardText($cardText)
    {
        $this->cardText = $cardText;

        return $this;
    }

    /**
     * Get cardText
     *
     * @return string
     */
    public function getCardText()
    {
        return $this->cardText;
    }
}
