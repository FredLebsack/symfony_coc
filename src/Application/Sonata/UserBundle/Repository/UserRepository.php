<?php

namespace Application\Sonata\UserBundle\Repository;

use Doctrine\ORM\EntityRepository;


class UserRepository extends EntityRepository
{
    public function getNumberUsers($clan)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.clan = :clan')
            ->setParameter('clan', $clan);

        return count($qb->getQuery()->getResult());
    }

    public function getNumberUsersNonAssigned( $clan)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.player is NULL')
            ->andWhere('u.clan = :clan')
            ->setParameter('clan', $clan);
        return count($qb->getQuery()->getResult());
    }


    public function getNonAssignedUsers()
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.player', '!=', NULL)
            ->orderBy('u.id', 'DESC');
        // ->setParameter('season', $season);

        return $qb;
    }

    public function getUsers($clan)
    {
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.clan = :clan')
            ->andWhere('u.phone is NOT NULL')
            ->orderBy('u.username', 'DESC')
            ->setParameter('clan', $clan);

        return $qb;
    }


    public function findUserInfoBySeason($season)
    {
        //$em = $this->getDoctrine()->getManager();
        //  $season = $em->getRepository('COCBundle:Season')->getActualSeason();

        $now = new \DateTime();
        // $now = new \DateTime('Y-m-d H:i:s');
        $qb = $this->createQueryBuilder('u')
            ->select('u')
            ->where('u.season = :season')
            ->orderBy('u.level', 'DESC')
         ->setParameter('season', $season);

        return $qb->getQuery()->getResult();
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
