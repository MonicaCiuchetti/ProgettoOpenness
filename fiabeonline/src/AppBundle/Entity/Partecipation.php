<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Partecipation
 *
 * @ORM\Table(name="partecipation")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartecipationRepository")
 */
class Partecipation
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
     * Set character
     *
     * @param \AppBundle\Entity\Card $character
     * @return Partecipation
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
     * @return Partecipation
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
