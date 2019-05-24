<?php

namespace App\Controller;

use App\Entity\Events;
use App\Entity\Inscription;
use App\Form\InscriptionEventType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InscriptionEventController extends AbstractController
{
    /**
     * @Route("/{id}/inscription/event", name="inscription_event")
     */
    public function index($id)
    {
        $event = $this->getDoctrine()->getRepository(Events::class)->find($id);
        $ins=$event->getInscriptions();
        return $this->render('inscription_event/index.html.twig', [
            'controller_name' => 'InscriptionEventController',
            'id' => $event->getId(),
            'ins'=>$ins
        ]);
    }
    /**
     * @Route("/{id}/inscription/event/new", name="new_inscription")
     */
    public function newInscription(Request $request, $id, ObjectManager $entityManager) {
        $event = $this->getDoctrine()->getRepository(Events::class)->find($id); 
        dump($event);
        $ins = new Inscription();
        $ins->addEvent($event);
    	$form = $this->createForm(InscriptionEventType::class, $ins);
        
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $ins = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ins);
            $entityManager->flush();

            return $this->redirectToRoute('inscription_event', [
                'id' => $event->getId(),
            ]);
        }
        return $this->render('inscription_event/new.html.twig', [
            'form' => $form->createView(),
            'event' => $event
        ]);
    }
} 
