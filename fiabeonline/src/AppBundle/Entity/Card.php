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
    private  $id;
    /**
     * @var string
     *
     * @ORM\Column(name="cardDescription", type="string", length=50)
     */
    private $cardDescription;
    /**
     * @var string
     *
     * @ORM\Column(name="cardText", type="string", length=100)
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
