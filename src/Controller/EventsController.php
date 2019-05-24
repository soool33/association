<?php

namespace App\Controller;

use App\Entity\Events;
use Knp\Component\Pager\PaginatorInterface;
use App\Controller\EventsController;
use App\Repository\EventsRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class EventsController extends AbstractController
{
    /**
     * @Route("/events", name="events")
     */
    public function index(Request $request, EventsRepository $repo, PaginatorInterface $paginator) { 
       
        $events = $paginator->paginate( $this->getDoctrine()
                      ->getRepository(Events::class)
                      ->findBy(array(), array('id' => 'desc')),
                      $request->query->getInt('page', 1),
                      6
                  );
        return $this->render('events/index.html.twig', [
            'controller_name' => 'EventsController',
            'events'=>$events
        ]);
    }
    /**
     * @Route("admin/events/{id}/edit", name="modif_event")
     */
    public function modifierProduit($id,Request $request) {
    	$events = $this->getDoctrine()
    	                ->getRepository(Events::class)
    	                ->find($id);

    	$form = $this->createFormBuilder($events)
            ->add('title',TextType::class)
            ->add('lieu',TextType::class)
            ->add('dateEvent',DateType::class)
            ->add('imageFile1',VichImageType::class)
            ->add('imageFile2',VichImageType::class)
            ->add('imageFile3',VichImageType::class)
            ->add('imageFile4',VichImageType::class)
            ->add('descriptEvent',TextareaType::class)
            ->getForm();
            
            $form->handleRequest($request);

	    if ($form->isSubmitted() && $form->isValid()) {
	        
	        $events = $form->getData();
	        $entityManager = $this->getDoctrine()->getManager();
	        $entityManager->flush();

	        return $this->redirectToRoute('events');
	    }

        return $this->render('events/newevent.html.twig', [
           'form' => $form->createView(),
           'editMode' => $events->getId() !== null
        ]);
    }
    /**
     * @Route("admin/events/new", name="new_event")
     */
    public function newEvent(Request $request) {
        $events = new Events();
    	$form = $this->createFormBuilder($events)
    		->add('title',TextType::class)
    		->add('lieu',TextType::class)
            ->add('dateEvent',DateType::class)
            ->add('imageFile1',VichImageType::class, [
                'required' => false,
            ])
            ->add('imageFile2',VichImageType::class, [
                'required' => false,
            ])
            ->add('imageFile3',VichImageType::class, [
                'required' => false,
            ])
            ->add('imageFile4',VichImageType::class, [
                'required' => false, 
            ])
            ->add('descriptEvent',TextareaType::class)
            ->getForm();
            
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $events = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($events);
            $entityManager->flush();

            return $this->redirectToRoute('events');
        }
        return $this->render('events/newevent.html.twig', [
            'form' => $form->createView(),
            'editMode' => $events->getId() !== null
        ]);
    }
    /**
     * @Route("/events/{id}", name="event")
     */
    public function show(EventsRepository $repo, $id) {
    
        $events=$repo->find($id);

        return $this->render('events/show.html.twig',[
            'events'=>$events,
            'id'=>$id,
        ]);
    }
}
