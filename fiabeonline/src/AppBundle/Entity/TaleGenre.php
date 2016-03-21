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
     * @ORM\ManyToOne(targetEntity="Tale", inversedBy="taleGenres")
     * @ORM\JoinColumn(name="Tale_id", referencedColumnName="id")
     */
    private $taleId;

    /**
     * @ORM\ManyToOne(targetEntity="Genre", inversedBy="taleGenres")
     * @ORM\JoinColumn(name="Genre_id", referencedColumnName="id")
     */
    private $genreId;

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
     * @param \AppBundle\Entity\Tale $taleId
     * @return TaleGenre
     */
    public function setTaleId(\AppBundle\Entity\Tale $taleId = null)
    {
        $this->taleId = $taleId;

        return $this;
    }

    /**
     * Get taleId
     *
     * @return \AppBundle\Entity\Tale 
     */
    public function getTaleId()
    {
        return $this->taleId;
    }

    /**
     * Set genreId
     *
     * @param \AppBundle\Entity\Genre $genreId
     * @return TaleGenre
     */
    public function setGenreId(\AppBundle\Entity\Genre $genreId = null)
    {
        $this->genreId = $genreId;

        return $this;
    }

    /**
     * Get genreId
     *
     * @return \AppBundle\Entity\Genre 
     */
    public function getGenreId()
    {
        return $this->genreId;
    }
}
