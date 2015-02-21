<?php

namespace COC\COCBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        $user = $this->getUser();
        $display = false;

        if ( $user != null)
        {
            if ($user->getVisited() == 0)
            {
                var_dump($user);
                $user->setVisited(1);
                $em->persist($user);
                $em->flush();
                $display = true;
            }
        }
        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($clan);

        return $this->render('COCBundle:Default:index.html.twig', array('display' => $display, 'numberPlayers' => $numberPlayers, 'clan' => $clan));
    }

    public function menuAction($id_clan, $active)
    {
        $em = $this->getDoctrine()->getManager();

        $service = $this->container->get('coc_cocbundle.clan_info') ;
        $clan = $service->getClan($id_clan);

        $numberPlayers = $em->getRepository('COCBundle:Player')->getNumberEntities($clan);
        $numberBases = $em->getRepository('COCBundle:ImageBase')->getNumberEntities($clan);
        $numberVideos = $em->getRepository('COCBundle:Video')->getNumberEntities($clan);
       // $numberWars = $em->getRepository('COCBundle:War')->getNumberWars();
        $numberBestAttacks = $em->getRepository('COCBundle:ImageBestAttack')->getNumberEntities($clan);
        $numberUsersNonAssigned = $em->getRepository('ApplicationSonataUserBundle:User')->getNumberUsersNonAssigned($clan);
        $numberImagesBonus = $em->getRepository('COCBundle:ImageBonus')->getNumberEntities($clan);

        return $this->render('COCBundle:Default:menu.html.twig' , array('numberPlayers' => $numberPlayers, 'active' => $active,  'clan' => $clan, 'numberImagesBonus' => $numberImagesBonus,'numberUsersNonAssigned' => $numberUsersNonAssigned,'numberVideos' => $numberVideos, 'numberBestAttacks' => $numberBestAttacks, 'numberBases' => $numberBases));
    }
}
