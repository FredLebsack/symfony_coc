<?php

namespace Application\Sonata\UserBundle\Controller;


use COC\COCBundle\Entity\Clan;
use COC\COCBundle\Entity\Player;
use COC\COCBundle\Entity\Video;
use COC\COCBundle\Entity\ImageBonus;
use COC\COCBundle\Entity\ImageBase;
use COC\COCBundle\Entity\ImageBestAttack;
use FOS\UserBundle\Controller\RegistrationController as BaseController;

use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;



class RegistrationController extends BaseController
{
    public function getParent()
    {
        return 'FOSUserBundle';
    }




    static function copy($source, $target) {


        if (!is_dir($source)) {//it is a file, do a normal copy
            copy($source, $target);
            return;
        }

        //it is a folder, copy its files & sub-folders
        @mkdir($target);
        $d = dir($source);
        $navFolders = array('.', '..');
        while (false !== ($fileEntry=$d->read() )) {//copy one by one
            //skip if it is navigation folder . or ..
            if (in_array($fileEntry, $navFolders) ) {
                continue;
            }

            //do copy
            $s = "$source/$fileEntry";
            $t = "$target/$fileEntry";
            self::copy($s, $t);
        }
        $d->close();
    }



    public function registerAction(Request $request)
    {
        $type = $request->query->get('type');

        /** @var $formFactory \FOS\UserBundle\Form\Factory\FactoryInterface */
        $formFactory = $this->get('fos_user.registration.form.factory');
        /** @var $userManager \FOS\UserBundle\Model\UserManagerInterface */
        $userManager = $this->get('fos_user.user_manager');
        /** @var $dispatcher \Symfony\Component\EventDispatcher\EventDispatcherInterface */
        $dispatcher = $this->get('event_dispatcher');

        $user = $userManager->createUser();
        $user->setEnabled(true);

        $event = new GetResponseUserEvent($user, $request);
        $dispatcher->dispatch(FOSUserEvents::REGISTRATION_INITIALIZE, $event);

        if (null !== $event->getResponse()) {
            return $event->getResponse();
        }

        $form = $formFactory->createForm();
        $form->setData($user);

        $form->handleRequest($request);

        if ($form->isValid())
        {
            $user = $form->getData();


            // CREATE CLAN
            if ( $form->get('pass')->getData() != null && $form->get('clanName')->getData() != null )
            {

                $em = $this->getDoctrine()->getManager();
                $clan = new Clan();
                $clan->setPassword($form->get('pass')->getData());
                $clan->setName($user->getClanName());
                $clan->setMessage('???One love, one heart, one destiny.??? ??? Bob Marley');
                $clan->setCapacity(10);
                $clan->setStatus(0);
                $clan->setLevel(1);
                $clan->setPrivacy(0);
                $clan->setSmsavailable(2);
                $clan->setTotalAttackWon(0);
                $clan->setTotalTroopReceived(0);
                $clan->setTotalTroopSent(0);
                $clan->setTotalGeneral(7);
                $clan->setTotalTrophy(0);

                $clan->setNumberBase5(0);
                $clan->setNumberBase6(1);
                $clan->setNumberBase7(3);
                $clan->setNumberBase8(3);
                $clan->setNumberBase9(2);
                $clan->setNumberBase10(0);
                $clan->setNumberBonus(2);
                $clan->setNumberVideo(2);
                $clan->setNumberBestAttack(1);
                $clan->setNumberPlayer(1);


                $em->persist($clan);
                $em->flush();

                $idClan = $clan->getId();
                $clan = $em->getRepository('COCBundle:Clan')->find($idClan);

                $user->setClan($clan);
                $user->setRoles(array('ROLE_ADMIN'));
                $user->setVisited(0);
                $user->setLearned(0);
                $user->setPhone($form->get('country')->getData());
                $em->persist($user);
                $em->flush($user);

                $imageBestAttack = $em->getRepository('COCBundle:Image')->findOneByPath("bestattaque.png");
                $bestAttack = new ImageBestAttack();
                $bestAttack->setClan($clan);
                $bestAttack->setElixir(373293);
                $bestAttack->setGold(346732);
                $bestAttack->setImage($imageBestAttack);
                $bestAttack->setUser($user);

                $src =  __dir__ . '/../../../../../web/uploads/1/';
                $dest =  __dir__ . '/../../../../../web/uploads/' . $idClan ;

                // copy the images in the new clan's folder
                $this->copy($src,$dest);

                $imageBonus1 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus1.png");
                $bonus1 = new ImageBonus();
                $bonus1->setClan($clan);
                $bonus1->setTitle("Example 1");
                $bonus1->setImage($imageBonus1);
                $bonus1->setUser($user);

                $imageBonus2 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus2.png");
                $bonus2 = new ImageBonus();
                $bonus2->setClan($clan);
                $bonus2->setTitle("Example 2");
                $bonus2->setImage($imageBonus2);
                $bonus2->setUser($user);

                $imageBonus3 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus3.png");
                $bonus3 = new ImageBonus();
                $bonus3->setClan($clan);
                $bonus3->setTitle("Example 3");
                $bonus3->setImage($imageBonus3);
                $bonus3->setUser($user);

                $em->persist($bonus1);
                $em->persist($bonus2);
                $em->persist($bonus3);

                $imageBase1 = $em->getRepository('COCBundle:Image')->findOneByPath("base6-1-1.png");
                $base1 = new ImageBase();
                $base1->setClan($clan);
                $base1->setImage($imageBase1);
                $base1->setUser($user);
                $base1->setHallTown(6);
                $base1->setType(1);

                $imageBase2 = $em->getRepository('COCBundle:Image')->findOneByPath("base7-1-1.png");
                $base2 = new ImageBase();
                $base2->setClan($clan);
                $base2->setImage($imageBase2);
                $base2->setUser($user);
                $base2->setHallTown(7);
                $base2->setType(1);

                $imageBase3 = $em->getRepository('COCBundle:Image')->findOneByPath("base7-2-2.png");
                $base3 = new ImageBase();
                $base3->setClan($clan);
                $base3->setImage($imageBase3);
                $base3->setUser($user);
                $base3->setHallTown(7);
                $base3->setType(2);

                $imageBase4 = $em->getRepository('COCBundle:Image')->findOneByPath("base7-1-3.png");
                $base4 = new ImageBase();
                $base4->setClan($clan);
                $base4->setImage($imageBase4);
                $base4->setUser($user);
                $base4->setHallTown(7);
                $base4->setType(1);

                $imageBase5 = $em->getRepository('COCBundle:Image')->findOneByPath("base8-1-1.png");
                $base5 = new ImageBase();
                $base5->setClan($clan);
                $base5->setImage($imageBase5);
                $base5->setUser($user);
                $base5->setHallTown(8);
                $base5->setType(1);

                $imageBase6 = $em->getRepository('COCBundle:Image')->findOneByPath("base8-1-2.png");
                $base6 = new ImageBase();
                $base6->setClan($clan);
                $base6->setImage($imageBase6);
                $base6->setUser($user);
                $base6->setHallTown(8);
                $base6->setType(1);

                $imageBase7 = $em->getRepository('COCBundle:Image')->findOneByPath("base8-1-3.png");
                $base7 = new ImageBase();
                $base7->setClan($clan);
                $base7->setImage($imageBase7);
                $base7->setUser($user);
                $base7->setHallTown(8);
                $base7->setType(1);

                $imageBase8 = $em->getRepository('COCBundle:Image')->findOneByPath("base9-1-1.png");
                $base8 = new ImageBase();
                $base8->setClan($clan);
                $base8->setImage($imageBase8);
                $base8->setUser($user);
                $base8->setHallTown(9);
                $base8->setType(1);

                $imageBase9 = $em->getRepository('COCBundle:Image')->findOneByPath("base9-1-2.png");
                $base9 = new ImageBase();
                $base9->setClan($clan);
                $base9->setImage($imageBase9);
                $base9->setUser($user);
                $base9->setHallTown(9);
                $base9->setType(1);


                $em->persist($base1);
                $em->persist($base2);
                $em->persist($base3);
                $em->persist($base4);
                $em->persist($base5);
                $em->persist($base6);
                $em->persist($base7);
                $em->persist($base8);
                $em->persist($base9);

                $video1 = new Video();
                $video1->setUrl("https://www.youtube.com/watch?v=FhHeH6MMjTM");
                $video1->setUser($user);
                $video1->setTitle("Example video 1");
                $video1->setClan($clan);

                $video2 = new Video();
                $video2->setUrl("https://www.youtube.com/watch?v=GC2qk2X3fKA");
                $video2->setUser($user);
                $video2->setTitle("Example video  2");
                $video2->setClan($clan);

                $em->persist($video1);
                $em->persist($video2);

                $em->persist($bestAttack);
                $em->flush();

                $player1 = new Player();

                $profileDefault = $em->getRepository('COCBundle:Image')->findOneByPath("profile.jpg");
                $baseDefault    = $em->getRepository('COCBundle:Image')->findOneByPath("base.jpg");

                $player1->setBase($baseDefault);
                $player1->setPicture($profileDefault);
                $player1->setClan($clan);
                $player1->setName($user->getUsername());
                $player1->setHallTown(1);
                $player1->setLevel(1);
                $player1->setTroopReceived(0);
                $player1->setTroopSent(0);
                $player1->setAttackWon(0);
                $player1->setTrophy(0);

                $player1->setCanon1(1);
                $player1->setCanon2(0);
                $player1->setCanon3(0);
                $player1->setCanon4(0);
                $player1->setCanon5(0);
                $player1->setCanon6(0);

                $player1->setTowerArcher1(1);
                $player1->setTowerArcher2(0);
                $player1->setTowerArcher3(0);
                $player1->setTowerArcher4(0);
                $player1->setTowerArcher5(0);
                $player1->setTowerArcher6(0);
                $player1->setTowerArcher7(0);

                $player1->setTowerMagic1(0);
                $player1->setTowerMagic2(0);
                $player1->setTowerMagic3(0);
                $player1->setTowerMagic4(0);

                $player1->setAirDefence1(1);
                $player1->setAirDefence2(0);
                $player1->setAirDefence3(0);
                $player1->setAirDefence4(0);

                $player1->setMortar1(0);
                $player1->setMortar2(0);
                $player1->setMortar3(0);
                $player1->setMortar4(0);

                $player1->setTesla1(0);
                $player1->setTesla2(0);
                $player1->setTesla3(0);
                $player1->setTesla4(0);

                $player1->setInferno1(0);
                $player1->setInferno2(0);

                $player1->setArcx1(0);
                $player1->setArcx2(0);
                $player1->setArcx3(0);


                $player1->setBarbar(1);
                $player1->setArcher(0);
                $player1->setGobelin(0);
                $player1->setGeant(0);
                $player1->setWallBreaker(0);
                $player1->setBallon(0);
                $player1->setHealer(0);
                $player1->setWizard(0);
                $player1->setDragon(0);
                $player1->setPekka(0);

                $player1->setKing(0);
                $player1->setQueen(0);

                $player1->setMinion(0);
                $player1->setRider(0);
                $player1->setValkyrie(0);
                $player1->setGolem(0);
                $player1->setWitch(0);
                $player1->setLava(0);

                $player1->setGold1(0);
                $player1->setGold2(0);
                $player1->setGold3(0);
                $player1->setGold4(0);
                $player1->setGold5(0);
                $player1->setGold6(0);
                $player1->setGold7(0);

                $player1->setElixir1(0);
                $player1->setElixir2(0);
                $player1->setElixir3(0);
                $player1->setElixir4(0);
                $player1->setElixir5(0);
                $player1->setElixir6(0);
                $player1->setElixir7(0);


                $player1->setPotionDamage(0);
                $player1->setPotionHeal(0);
                $player1->setPotionBoost(0);
                $player1->setPotionGreen(0);
                $player1->setPotionFreeze(0);

                $player1->setUser($user);
                $em->persist($player1);
                $em->flush($player1);

                $user->setPlayer($player1);
                $em->persist($user);
                $em->flush($user);


              //  echo "======> " . $request->request->get('clan') ;
               // echo "<br/> =========> " . $request->request->get('password') ;
            }
            else // JOINING CLAN
            {
              //  echo " JOINING CLAN ======> ".$form->get('clan')->getData() . " => " .$form->get('password')->getData() ;

                $user = $form->getData();
                $clan = $form->get('clan')->getData();
                $password = $form->get('password')->getData();

                $em = $this->getDoctrine()->getManager();
                $clan = $em->getRepository('COCBundle:Clan')->find($clan->getId());
                $passwordClan = $clan->getPassword();

                if ( $passwordClan == $password)
                {
                    $user->setClan($clan);
                    $user->setVisited(0);
                    $user->setPhone($form->get('country')->getData());
                    $em->persist($user);
                    $em->flush($user);
                }
                else
                {
                    //$this->setFlash('error', 'Pas de passe incorrect.');
                    $route = 'fos_user_registration_register';
                    $wrongPassword = 1;
                    $url = $this->container->get('router')->generate($route, array('type' => 'join', 'wrongPassword' => $wrongPassword));

                    return new RedirectResponse($url);
                }
            }

            $event = new FormEvent($form, $request);
            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_SUCCESS, $event);

            $userManager->updateUser($user);


            if (null === $response = $event->getResponse()) {
                $url = $this->generateUrl('coc', array('id_clan' => $clan->getId()));
                $response = new RedirectResponse($url);
            }

            $dispatcher->dispatch(FOSUserEvents::REGISTRATION_COMPLETED, new FilterUserResponseEvent($user, $request, $response));

            return $response;
        }
        else
        {
            echo "no";
        }

        return $this->render('FOSUserBundle:Registration:register.html.twig', array( 'type' => $type,
            'form' => $form->createView(),
        ));
    }



    public function registerAction2(Request $request)
    {
        $securityContext = $this->container->get('security.context');
        $request->request->get('type');

        echo($request);
        die();
        if ($securityContext->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            $url = $this->container->get('router')->generate('vitrine_homepage');
            $response = new RedirectResponse($url);
            return $response;
        }
        $form = $this->container->get('fos_user.registration.form');
        $formHandler = $this->container->get('fos_user.registration.form.handler');
        $confirmationEnabled = $this->container->getParameter('fos_user.registration.confirmation.enabled');

        $process = $formHandler->process($confirmationEnabled);
        if ($process)
        {
            $user = $form->getData();
            $clanName = $user->getClanName();

            $authUser = false;
            if ($confirmationEnabled)
            {
                $this->container->get('session')->set('fos_user_send_confirmation_email/email', $user->getEmail());
                $route = 'fos_user_registration_check_email';
            } else {
                $authUser = true;
                $route = 'coc';
            }

            $em = $this->container->get('doctrine')->getManager();

            if ( $clanName != null)
            {
                die();
                $clan = new Clan();
                $clan->setNumberBase5(0);
                $clan->setNumberBase6(1);
                $clan->setNumberBase7(3);
                $clan->setNumberBase8(2);
                $clan->setNumberBase9(2);
                $clan->setNumberBase10(0);
                $clan->setNumberBonus(2);
                $clan->setNumberVideo(2);
                $clan->setNumberBestAttack(2);
                $clan->setNumberPlayer(1);

                $clan->setName($user->getClanName());
                $clan->setMessage('???One love, one heart, oneeeeeeeeeeeeee destiny.??? ??? Bob Marley');
                $clan->setCapacity(10000);
                $clan->setCountry('none');
                $clan->setLevel(1);
                $clan->setTotalAttackWon(0);
                $clan->setTotalTroopReceived(0);
                $clan->setTotalTroopSent(0);
                $clan->setStatus(0);
                $clan->setPrivacy(0);



                $em->persist($clan);
                $em->flush();

                $idClan = $clan->getId();
                $clan = $em->getRepository('COCBundle:Clan')->find($idClan);

                var_dump($clan->getNumberVideo());
                die();
                $user->setClan($clan);
                $user->setRoles(array('ROLE_ADMIN'));
                $user->setVisited(0);
                $user->setLearned(0);
                $em->persist($user);
                $em->flush($user);

                $imageBestAttack = $em->getRepository('COCBundle:Image')->findOneByPath("bestattaque.png");
                $bestAttack = new ImageBestAttack();
                $bestAttack->setClan($clan);
                $bestAttack->setElixir(373293);
                $bestAttack->setGold(346732);
                $bestAttack->setImage($imageBestAttack);
                $bestAttack->setUser($user);

                $imageBonus1 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus1.png");
                $bonus1 = new ImageBonus();
                $bonus1->setClan($clan);
                $bonus1->setTitle("Example 1");
                $bonus1->setImage($imageBonus1);
                $bonus1->setUser($user);

                $imageBonus2 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus2.png");
                $bonus2 = new ImageBonus();
                $bonus2->setClan($clan);
                $bonus2->setTitle("Example 2");
                $bonus2->setImage($imageBonus2);
                $bonus2->setUser($user);

                $imageBonus3 = $em->getRepository('COCBundle:Image')->findOneByPath("bonus3.png");
                $bonus3 = new ImageBonus();
                $bonus3->setClan($clan);
                $bonus3->setTitle("Example 3");
                $bonus3->setImage($imageBonus3);
                $bonus3->setUser($user);

                $em->persist($bonus1);
                $em->persist($bonus2);
                $em->persist($bonus3);

                $imageBase1 = $em->getRepository('COCBundle:Image')->findOneByPath("base6-1-1.png");
                $base1 = new ImageBase();
                $base1->setClan($clan);
                $base1->setImage($imageBase1);
                $base1->setUser($user);
                $base1->setHallTown(6);
                $base1->setType(1);

                $imageBase2 = $em->getRepository('COCBundle:Image')->findOneByPath("base7-1-1.png");
                $base2 = new ImageBase();
                $base2->setClan($clan);
                $base2->setImage($imageBase2);
                $base2->setUser($user);
                $base2->setHallTown(7);
                $base2->setType(1);

                $imageBase3 = $em->getRepository('COCBundle:Image')->findOneByPath("base7-2-2.png");
                $base3 = new ImageBase();
                $base3->setClan($clan);
                $base3->setImage($imageBase3);
                $base3->setUser($user);
                $base3->setHallTown(7);
                $base3->setType(2);

                $imageBase4 = $em->getRepository('COCBundle:Image')->findOneByPath("base7-1-3.png");
                $base4 = new ImageBase();
                $base4->setClan($clan);
                $base4->setImage($imageBase4);
                $base4->setUser($user);
                $base4->setHallTown(7);
                $base4->setType(1);

                $imageBase5 = $em->getRepository('COCBundle:Image')->findOneByPath("base8-1-1.png");
                $base5 = new ImageBase();
                $base5->setClan($clan);
                $base5->setImage($imageBase5);
                $base5->setUser($user);
                $base5->setHallTown(8);
                $base5->setType(1);

                $imageBase6 = $em->getRepository('COCBundle:Image')->findOneByPath("base8-1-2.png");
                $base6 = new ImageBase();
                $base6->setClan($clan);
                $base6->setImage($imageBase6);
                $base6->setUser($user);
                $base6->setHallTown(8);
                $base6->setType(1);

                $imageBase7 = $em->getRepository('COCBundle:Image')->findOneByPath("base8-1-3.png");
                $base7 = new ImageBase();
                $base7->setClan($clan);
                $base7->setImage($imageBase7);
                $base7->setUser($user);
                $base7->setHallTown(8);
                $base7->setType(1);

                $imageBase8 = $em->getRepository('COCBundle:Image')->findOneByPath("base9-1-1.png");
                $base8 = new ImageBase();
                $base8->setClan($clan);
                $base8->setImage($imageBase8);
                $base8->setUser($user);
                $base8->setHallTown(9);
                $base8->setType(1);

                $imageBase9 = $em->getRepository('COCBundle:Image')->findOneByPath("base9-1-2.png");
                $base9 = new ImageBase();
                $base9->setClan($clan);
                $base9->setImage($imageBase9);
                $base9->setUser($user);
                $base9->setHallTown(9);
                $base9->setType(1);


                $em->persist($base1);
                $em->persist($base2);
                $em->persist($base3);
                $em->persist($base4);
                $em->persist($base5);
                $em->persist($base6);
                $em->persist($base7);
                $em->persist($base8);
                $em->persist($base9);

                $video1 = new Video();
                $video1->setUrl("https://www.youtube.com/watch?v=FhHeH6MMjTM");
                $video1->setUser($user);
                $video1->setTitle("Example video 1");
                $video1->setClan($clan);

                $video2 = new Video();
                $video2->setUrl("https://www.youtube.com/watch?v=GC2qk2X3fKA");
                $video2->setUser($user);
                $video2->setTitle("Example video  2");
                $video2->setClan($clan);

                $em->persist($video1);
                $em->persist($video2);

                $em->persist($bestAttack);
                $em->flush();

                $player1 = new Player();
                $player1->setClan($clan);
                $player1->setTotal(0);
                $player1->setName($user->getUsername());
                $player1->setHallTown(5);
                $player1->setLevel(1);
                $player1->setTroopReceived(0);
                $player1->setTroopSent(0);
                $player1->setAttackWon(0);
                $player1->setTrophy(0);

                $player1->setCanon1(1);
                $player1->setCanon2(0);
                $player1->setCanon3(0);
                $player1->setCanon4(0);
                $player1->setCanon5(0);
                $player1->setCanon6(0);

                $player1->setTowerArcher1(1);
                $player1->setTowerArcher2(0);
                $player1->setTowerArcher3(0);
                $player1->setTowerArcher4(0);
                $player1->setTowerArcher5(0);
                $player1->setTowerArcher6(0);
                $player1->setTowerArcher7(0);

                $player1->setTowerMagic1(0);
                $player1->setTowerMagic2(0);
                $player1->setTowerMagic3(0);
                $player1->setTowerMagic4(0);

                $player1->setAirDefence1(1);
                $player1->setAirDefence2(0);
                $player1->setAirDefence3(0);
                $player1->setAirDefence4(0);

                $player1->setMortar1(0);
                $player1->setMortar2(0);
                $player1->setMortar3(0);
                $player1->setMortar4(0);

                $player1->setTesla1(0);
                $player1->setTesla2(0);
                $player1->setTesla3(0);
                $player1->setTesla4(0);

                $player1->setInferno1(0);
                $player1->setInferno2(0);

                $player1->setArcx1(0);
                $player1->setArcx2(0);
                $player1->setArcx3(0);


                $player1->setBarbar(1);
                $player1->setArcher(0);
                $player1->setGobelin(0);
                $player1->setGeant(0);
                $player1->setWallBreaker(0);
                $player1->setBallon(0);
                $player1->setHealer(0);
                $player1->setWizard(0);
                $player1->setDragon(0);
                $player1->setPekka(0);

                $player1->setKing(0);
                $player1->setQueen(0);

                $player1->setMinion(0);
                $player1->setRider(0);
                $player1->setValkyrie(0);
                $player1->setGolem(0);
                $player1->setWitch(0);
                $player1->setLava(0);

                $player1->setGold1(0);
                $player1->setGold2(0);
                $player1->setGold3(0);
                $player1->setGold4(0);
                $player1->setGold5(0);
                $player1->setGold6(0);
                $player1->setGold7(0);

                $player1->setElixir1(0);
                $player1->setElixir2(0);
                $player1->setElixir3(0);
                $player1->setElixir4(0);
                $player1->setElixir5(0);
                $player1->setElixir6(0);
                $player1->setElixir7(0);


                $player1->setPotionDamage(0);
                $player1->setPotionHeal(0);
                $player1->setPotionBoost(0);
                $player1->setPotionGreen(0);
                $player1->setPotionFreeze(0);

                $player1->setUser($user);
                $em->persist($player1);
                $em->flush($player1);

                $user->setPlayer($player1);
                $em->persist($user);
                $em->flush($user);
            }
            else
            {
                $user = $form->getData();
                $clan = $user->getClan();
                $password = $user->getPass();

                $clan = $em->getRepository('COCBundle:Clan')->find($clan->getId());
                $passwordClan = $clan->getPassword();

                if ( $passwordClan == $password)
                {
                    $user->setClan($clan);
                    $user->setVisited(0);
                    $em->persist($user);
                    $em->flush($user);
                }
                else
                {
                    $this->setFlash('error', 'Pas de passe incorrect.');
                    $route = 'fos_user_registration_register';
                    $url = $this->container->get('router')->generate($route);

                    return new RedirectResponse($url);
                }

            }

            $this->setFlash('fos_user_success', 'registration.flash.user_created');
            $url = $this->container->get('router')->generate($route, array('id_clan' => $clan->getId()));
            $response = new RedirectResponse($url);

            if ($authUser) {
                $this->authenticateUser($user, $response);
            }

            return $response;
        }

        return $this->container->get('templating')->renderResponse('FOSUserBundle:Registration:register.html.'.$this->getEngine(), array(
            'form' => $form->createView(),
        ));
    }
}