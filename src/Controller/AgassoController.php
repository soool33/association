<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\Agasso;
use App\Form\AgassoType;
use App\Entity\Association;
use App\Controller\AgassoController;
use App\Repository\AgassoRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgassoController extends AbstractController
{
    /**
     * @Route("/{id}/agasso", name="agasso")
     */
    public function index(AgassoRepository $repo, $id) {
        $asso = $this->getDoctrine()->getRepository(Association::class)->find($id);
        $agasso=$asso->getAgasso();
        return $this->render('agasso/index.html.twig', [
            'controller_name' => 'AgassoController',
            'id' => $asso->getId(),
            'agasso'=>$agasso
        ]);
    }
    /**
     * @Route("/agasso/{id}/edit", name="edit_agasso")
     */
    public function modifierAgasso($id,Request $request) {
        $asso = $this->getDoctrine()->getRepository(Association::class)->find($id);
        dump($asso);
    	$agasso = $this->getDoctrine()
    	                ->getRepository(Agasso::class)
    	                ->find($id);

        $form = $this->createFormBuilder($agasso)
            ->add('ag',TextType::class)
            ->add('dateAg',DateType::class)
            ->add('imageFile',VichImageType::class)
            //->add('association')
            ->getForm();
            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $agasso = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->flush();

            return $this->redirectToRoute('agasso', [
                'id' => $asso->getId(),
            ]);
        }
        return $this->render('agasso/edit.html.twig', [
            'form' => $form->createView(),
            'editMode' => $agasso->getId() !== null,
            'asso' => $asso
        ]);
    }
    /**
     * @Route("/{id}/agasso/new", name="new_agasso")
     */
    public function newAgasso(Request $request, $id) {
        $asso = $this->getDoctrine()->getRepository(Association::class)->find($id);
        $agasso = new Agasso();
        $agasso->setAssociation($asso);
    	$form = $this->createForm(AgassoType::class, $agasso);

            $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $agasso = $form->getData();

            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($agasso);
            $entityManager->flush();

            return $this->redirectToRoute('agasso', [
                'id' => $asso->getId(),
            ]);

        }
        return $this->render('agasso/newagasso.html.twig', [
            'form' => $form->createView(),
            'asso' => $asso->getId(),
        ]);
    }
    /**
     * @Route("/agasso/{id}", name="agassos")
     */
    public function show(AgassoRepository $repo, $id) {
    
        $agasso=$repo->find($id);
        
        return $this->render('agasso/show.html.twig',[
            'agasso'=>$agasso,
            'id' => $agasso->getId(),
        ]);
    }
}
 