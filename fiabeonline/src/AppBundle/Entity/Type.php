<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Type
 *
 * @ORM\Table(name="type")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TypeRepository")
 */
class Type
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
     * @ORM\Column(name="typeDescription", type="string", length=30)
     */
    private $typeDescription;

    /**
     * @ORM\OneToMany(targetEntity="Tale", mappedBy="type")
     */
    private $tales;

    public function __construct()
    {
        $this->tales = new ArrayCollection();
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
     * Set typeDescription
     *
     * @param string $typeDescription
     * @return Type
     */
    public function setTypeDescription($typeDescription)
    {
        $this->typeDescription = $typeDescription;

        return $this;
    }

    /**
     * Get typeDescription
     *
     * @return string 
     */
    public function getTypeDescription()
    {
        return $this->typeDescription;
    }

    /**
     * Add tales
     *
     * @param \AppBundle\Entity\Tale $tales
     * @return Type
     */
    public function addTale(\AppBundle\Entity\Tale $tales)
    {
        $this->tales[] = $tales;

        return $this;
    }

    /**
     * Remove tales
     *
     * @param \AppBundle\Entity\Tale $tales
     */
    public function removeTale(\AppBundle\Entity\Tale $tales)
    {
        $this->tales->removeElement($tales);
    }

    /**
     * Get tales
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTales()
    {
        return $this->tales;
    }
}
