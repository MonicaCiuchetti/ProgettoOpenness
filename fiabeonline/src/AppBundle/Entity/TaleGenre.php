<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TaleGenre
 *
 * @ORM\Table(name="talegenre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TaleGenreRepository")
 */
class TaleGenre
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
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="taleGenres")
     * @ORM\JoinColumn(name="genre", referencedColumnName="id")
     */
    private $genre;

    /**
     * @ORM\ManyToOne(targetEntity="Tale", inversedBy="taleGenres")
     * @ORM\JoinColumn(name="tale", referencedColumnName="id")
     */
    private $tale;

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
     * Set genre
     *
     * @param \AppBundle\Entity\Genre $genre
     * @return TaleGenre
     */
    public function setGenre(\AppBundle\Entity\Genre $genre = null)
    {
        $this->genre = $genre;

        return $this;
    }

    /**
     * Get genre
     *
     * @return \AppBundle\Entity\Genre 
     */
    public function getGenre()
    {
        return $this->genre;
    }

    /**
     * Set tale
     *
     * @param \AppBundle\Entity\Tale $tale
     * @return TaleGenre
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
}
