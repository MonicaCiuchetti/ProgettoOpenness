<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ActionRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ActionRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a
                  FROM AppBundle:Action a'
            )
            ->getResult();
    }
    public function findAllByTaleIdOrderedBySeqOrder($taleId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT a
                  FROM AppBundle:Action a JOIN a.sequence s
                  WHERE s.tale = :taleId
                  ORDER BY s.seqOrder ASC'
            )
            ->setParameter('taleId', $taleId)
            ->getResult();
    }
}
