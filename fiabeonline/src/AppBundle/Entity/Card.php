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
     * @ORM\Column(name="cardDescription", type="string", length=25)
     */
    private $cardDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="cardFront", type="string", length=40)
     */
    private $cardFront;

    /**
     * @ORM\ManyToOne(targetEntity="CardType", inversedBy="cards")
     * @ORM\JoinColumn(name="CardType_id", referencedColumnName="id")
     */
    private $cardTypeId;

    /**
     * @ORM\OneToMany(targetEntity="Action", mappedBy="cardId")
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
     * Set cardTypeId
     *
     * @param \AppBundle\Entity\CardType $cardTypeId
     * @return Card
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
}
