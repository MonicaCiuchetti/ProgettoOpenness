<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Genre
 *
 * @ORM\Table(name="genre")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GenreRepository")
 */
class Genre
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
     * @ORM\Column(name="genreDescription", type="string", length=30)
     */
    private $genreDescription;

    /**
     * @ORM\OneToMany(targetEntity="TaleGenre", mappedBy="Genre_id")
     */
    private $taleGenres;

    public function __construct()
    {
        $this->taleGenres = new ArrayCollection();
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
     * Set genreDescription
     *
     * @param string $genreDescription
     * @return Genre
     */
    public function setGenreDescription($genreDescription)
    {
        $this->genreDescription = $genreDescription;

        return $this;
    }

    /**
     * Get genreDescription
     *
     * @return string
     */
    public function getGenreDescription()
    {
        return $this->genreDescription;
    }

    /**
     * Add taleGenres
     *
     * @param \AppBundle\Entity\TaleGenre $taleGenres
     * @return Genre
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
}
