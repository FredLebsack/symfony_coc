<?php

namespace COC\COCBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * UserInfoRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PlayerRepository extends EntityRepository
{
    public function getPlayersBySeason($season)
    {
        $now = new \DateTime();
        // $now = new \DateTime('Y-m-d H:i:s');
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.season = :season')
            ->orderBy('u.level', 'DESC')
            ->setParameter('season', $season);

        return $qb->getQuery()->getResult();
    }


    public function getPlayers()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->orderBy('u.level', 'DESC');

        return $qb->getQuery()->getResult();
    }


    public function getNumberPlayers()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u');

        return count($qb->getQuery()->getResult());
    }

    public function getHistory($number = 0)
    {
        if ( $number == 0)
        {
            $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->orderBy('u.updatedAt', 'DESC');
        }
        else
        {
            $qb = $this->createQueryBuilder('u')
                ->select('u')
                ->orderBy('u.updatedAt', 'DESC')
                ->setMaxResults( $number );
        }

        //var_dump($qb->getQuery()->getResult());
        return $qb->getQuery()->getResult();
    }


    public function getNotAssociedToUser()
    {

        $qb = $this->createQueryBuilder('p')
            ->select('p')
            ->where('p.user is null');

        return $qb;
    }
}