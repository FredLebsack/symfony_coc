<?php

namespace COC\COCBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * ImageRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ImageBestAttackRepository extends EntityRepository
{
    public function getBestAttacks($clan)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.clan = :clan')
            ->orderBy('u.elixir + u.gold', 'DESC')
            ->setParameter('clan', $clan);


        //var_dump($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }

    public function getLastUpdate($clan)
    {
        $query = $this->_em->createQuery('SELECT m.updatedAt FROM COCBundle:ImageBestAttack m  WHERE m.clan = :clan  ORDER BY m.updatedAt DESC')
            ->setMaxResults(1)
            ->setParameter('clan', $clan);

        return $query->getOneOrNullResult();
    }

    public function getNumberEntities($clan)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.clan = :clan')
            ->select('u')
            ->setParameter('clan', $clan);

        return count($qb->getQuery()->getResult());
    }
}
