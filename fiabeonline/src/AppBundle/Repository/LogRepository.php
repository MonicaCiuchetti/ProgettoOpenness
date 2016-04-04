<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * LogRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class LogRepository extends EntityRepository
{
    public function findAll()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT l
                  FROM AppBundle:Log l'
            )
            ->getResult();
    }

    public function findAllOrderByLogTimeDesc()
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT l
                  FROM AppBundle:Log l
                  ORDER BY l.logTime DESC'
            )
            ->getResult();
    }

    public function findAllByUserId($userId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT l
                  FROM AppBundle:Log l JOIN l.user u
                  WHERE u.id = :userId'
            )
            ->setParameter('userId', $userId)
            ->getResult();
    }

    public function findAllByUserIdOrderByLogTimeDesc($userId)
    {
        return $this->getEntityManager()
            ->createQuery(
                'SELECT l
                  FROM AppBundle:Log l JOIN l.user u
                  WHERE u.id = :userId
                  ORDER BY l.logTime DESC'
            )
            ->setParameter('userId', $userId)
            ->getResult();
    }

    public function deleteById($logId)
    {
        $this->getEntityManager()
            ->createQuery(
                'DELETE FROM AppBundle:Log l WHERE l.id = :logId'
            )
            ->setParameter('logId', $logId)
            ->getResult();
    }
}
