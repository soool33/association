<?php

namespace App\Controller;
use App\Entity\Users;
use App\Entity\Activites;
use App\Form\ActivitesType;
use App\Controller\ActivitesController;
use App\Repository\ActivitesRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ActivitesController extends AbstractController
{
    /**
     * @Route("/activites", name="Activites")
     */
    public function index(ActivitesRepository $repo)
    {
        $activites = $repo->findAll();

        return $this->render('activites/index.html.twig', [
            'controller_name' => 'ActivitesController',
            'activites' => $activites
        ]);
    }

    /**
     * @Route("/activites/new", name="activites_create")
     * @Route("/activites/{id}/edit", name="activites_edit")
     * 
     * @Security("has_role('ROLE_SUPER_ADMIN')")
     * 
     *  on peux supprimer cette fonction 
     */
    public function form(Activites $activites = null, Request $request, ObjectManager $manager){
        if(!$activites){
            $activites = new Activites();
        }
        $formActivites = $this->createForm(ActivitesType::class, $activites);

        $formActivites->handleRequest($request);

        if($formActivites->isSubmitted() && $formActivites->isValid()){
            $manager->persist($activites);
            $manager->flush();
            return $this->redirectToRoute('activites_show', ['id' => $activites->getId()]);
        }

        return $this->render('activites/create.html.twig', [
            'form' => $formActivites->createView(),
            'editMode' => $activites->getId() !== null
        ]);
            
    }

    /**
     * @Route("/activites/{id}", name="activites_show")
     */
    public function show(Activites $activites){

        return $this->render('activites/show.html.twig', [
            'activites' => $activites
        ]);
    }
}