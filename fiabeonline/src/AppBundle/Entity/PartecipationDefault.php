<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartecipationDefault
 *
 * @ORM\Table(name="partecipationdefault")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartecipationDefaultRepository")
 */
class PartecipationDefault
{
    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="cards")
     * @ORM\JoinColumn(name="character", referencedColumnName="id")
     */
    private $character;

    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="cards")
     * @ORM\JoinColumn(name="function", referencedColumnName="id")
     */
    private $function;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", options={"default" = 5})
     */
    private $score;

    /**
     * Set score
     *
     * @param integer $score
     * @return PartecipationDefault
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * Get score
     *
     * @return integer 
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set character
     *
     * @param \AppBundle\Entity\Card $character
     * @return PartecipationDefault
     */
    public function setCharacter(\AppBundle\Entity\Card $character)
    {
        $this->character = $character;

        return $this;
    }

    /**
     * Get character
     *
     * @return \AppBundle\Entity\Card 
     */
    public function getCharacter()
    {
        return $this->character;
    }

    /**
     * Set function
     *
     * @param \AppBundle\Entity\Card $function
     * @return PartecipationDefault
     */
    public function setFunction(\AppBundle\Entity\Card $function)
    {
        $this->function = $function;

        return $this;
    }

    /**
     * Get function
     *
     * @return \AppBundle\Entity\Card 
     */
    public function getFunction()
    {
        return $this->function;
    }
}
