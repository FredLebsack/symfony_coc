<?php

namespace COC\AdminBundle\Controller;

use COC\COCBundle\Entity\ImageBase;
use COC\COCBundle\Form\Type\ImageBaseType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ImageBaseAdminController extends Controller
{

    public function indexAction($id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $list = $em->getRepository('COCBundle:ImageBase')->findAll();
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        // $season = $em->getRepository('COCBundle:Season')->getActualSeason();
        // var_dump($season);
        return $this->render('AdminBundle:ImageBaseAdmin:index.html.twig', array('clan' => $clan,'images' => $list));
    }

    public function editAction ($id, Request $request, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        //$userInfo = $em->getRepository('COCBundle:ImageBase')->findOneByUser($id);
        $imageBase = $em->getRepository('COCBundle:ImageBase')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        $form = $this->get('form.factory')->create(new ImageBaseType(), $imageBase);

        if ($form->handleRequest($request)->isValid())
        {
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageBase);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bases', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ImageBaseAdmin:edit.html.twig', array('clan' => $clan,
                'form'      =>  $form->createView(),
                'bestAttack'  => $imageBase
        ));
    }


    public function addAction (Request $request, $id_clan)
    {
        $imageBase = new ImageBase();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new ImageBaseType(), $imageBase);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($imageBase);
            $em->flush();
            return $this->redirect($this->generateUrl('admin_bases', array('id_clan' =>  $clan->getId())));
        }

        return $this->render('AdminBundle:ImageBaseAdmin:add.html.twig', array(
            'form'      =>  $form->createView(),
        ));
    }

    public function deleteAction($id, $id_clan)
    {
        $em = $this->getDoctrine()->getManager();
        $imageBase = $em->getRepository('COCBundle:ImageBase')->find($id);
        $clan = $this->container->get('coc_cocbundle.clan_info')->getClan($id_clan);

        if(!$imageBase)
        {
            throw $this->createNotFoundException('No bestAttack found');
        }
        $em = $this->getDoctrine()->getManager();
        $em->remove($imageBase);
        $em->flush();

        return $this->redirect($this->generateUrl('admin_bases', array('id_clan' =>  $clan->getId())));

    }
}