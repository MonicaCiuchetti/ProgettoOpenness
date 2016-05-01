<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CardType
 *
 * @ORM\Table(name="cardtype")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CardTypeRepository")
 */
class CardType
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
     * @ORM\Column(name="ctName", type="string", length=50)
     */
    private $ctName;

    /**
     * @var string
     *
     * @ORM\Column(name="ctDescription", type="string", length=250, nullable=true)
     */
    private $ctDescription;

    /**
     * @var string
     *
     * @ORM\Column(name="ctBack", type="string", length=50)
     */
    private $ctBack;

    /**
     * @ORM\OneToMany(targetEntity="Card", mappedBy="cardType")
     */
    private $cards;

    public function __construct()
    {
        $this->cards = new ArrayCollection();
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
     * Set ctName
     *
     * @param string $ctName
     * @return CardType
     */
    public function setCtName($ctName)
    {
        $this->ctName = $ctName;

        return $this;
    }

    /**
     * Get ctName
     *
     * @return string 
     */
    public function getCtName()
    {
        return $this->ctName;
    }

    /**
     * Set ctDescription
     *
     * @param string $ctDescription
     * @return CardType
     */
    public function setCtDescription($ctDescription)
    {
        $this->ctDescription = $ctDescription;

        return $this;
    }

    /**
     * Get ctDescription
     *
     * @return string 
     */
    public function getCtDescription()
    {
        return $this->ctDescription;
    }

    /**
     * Set ctBack
     *
     * @param string $ctBack
     * @return CardType
     */
    public function setCtBack($ctBack)
    {
        $this->ctBack = $ctBack;

        return $this;
    }

    /**
     * Get ctBack
     *
     * @return string 
     */
    public function getCtBack()
    {
        return $this->ctBack;
    }

    /**
     * Add actionsPropp
     *
     * @param \AppBundle\Entity\ActionPropp $actionsPropp
     * @return CardType
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
     * Add cards
     *
     * @param \AppBundle\Entity\Card $cards
     * @return CardType
     */
    public function addCard(\AppBundle\Entity\Card $cards)
    {
        $this->cards[] = $cards;

        return $this;
    }

    /**
     * Remove cards
     *
     * @param \AppBundle\Entity\Card $cards
     */
    public function removeCard(\AppBundle\Entity\Card $cards)
    {
        $this->cards->removeElement($cards);
    }

    /**
     * Get cards
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCards()
    {
        return $this->cards;
    }
}
