<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * SequenceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SequenceRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s
                  FROM AppBundle:Sequence s'
            )
            ->getResult();
    }

    public function findAllByTaleId($taleId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s
                  FROM AppBundle:Sequence s JOIN s.tale t
                  WHERE t.id = :taleId'
            )
            ->setParameter('taleId', $taleId)
            ->getResult();
    }

    public function findAllByTaleIdOrderedBySeqOrderAsc($taleId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT s
                  FROM AppBundle:Sequence s JOIN s.tale t
                  WHERE t.id = :taleId
                  ORDER BY s.seqOrder ASC'
            )
            ->setParameter('taleId', $taleId)
            ->getResult();
    }
}
