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
     * @var int
     *
     * @ORM\Column(name="Tale_id", type="integer")
     */
    private $taleId;

    /**
     * @var int
     *
     * @ORM\Column(name="Genre_id", type="integer")
     */
    private $genreId;

    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="taleGenres")
     * @ORM\JoinColumn(name="Genre_id", referencedColumnName="id")
     */
    protected $genre;

    /**
     * @ORM\ManyToOne(targetEntity="Tale", inversedBy="taleGenres")
     * @ORM\JoinColumn(name="Tale_id", referencedColumnName="id")
     */
    protected $tale;

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
     * Set taleId
     *
     * @param integer $taleId
     * @return TaleGenre
     */
    public function setTaleId($taleId)
    {
        $this->taleId = $taleId;

        return $this;
    }

    /**
     * Get taleId
     *
     * @return integer
     */
    public function getTaleId()
    {
        return $this->taleId;
    }

    /**
     * Set genreId
     *
     * @param integer $genreId
     * @return TaleGenre
     */
    public function setGenreId($genreId)
    {
        $this->genreId = $genreId;

        return $this;
    }

    /**
     * Get genreId
     *
     * @return integer
     */
    public function getGenreId()
    {
        return $this->genreId;
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
