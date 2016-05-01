<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ActionPropp
 *
 * @ORM\Table(name="actionpropp")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ActionProppRepository")
 */
class ActionPropp
{

    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="Card", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="card", referencedColumnName="id")
     */
    private $card;

    /**
     * @ORM\Id
     *
     * @ORM\ManyToOne(targetEntity="SequenceType", inversedBy="actionsPropp")
     * @ORM\JoinColumn(name="sequenceType", referencedColumnName="id")
     */
    private $sequenceType;

    /**
     * @var int
     *
     * @ORM\Column(name="score", type="integer", options={"default" = 5})
     */
    private $score;
}
