<?php
namespace App\Controller;

use App\Entity\Users;
use App\Form\UsersType;
use App\Entity\Activites;
use App\Entity\Association;
use App\Controller\UsersController;
use App\Repository\UsersRepository;
use Doctrine\ORM\Mapping\Annotation;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;



    class UsersController extends AbstractController

{
    /**
     * @Route("/admin/{id}/users", name="users_index")
     */
    public function index(UsersRepository $usersRepository, $id): Response
    {
        $asso = $this->getDoctrine()->getRepository(Association::class)->find($id);
        $users = $asso->getUsers();
        return $this->render('users/index.html.twig', [
            'users' => $users,
        ]);
    }
    /**
     * @Route("/admin/{id}/users/new", name="users_new", methods={"GET","POST"})
     */
    public function new(Request $request, ObjectManager $entityManager, $id): Response
    {
        $asso = $this->getDoctrine()->getRepository(Association::class)->find($id);
        $activites = $asso->getActivites();
        dump($activites);

        $user = new Users();
        $user->addAssociation($asso);
        $user->getActiviteUser($activites);

        $form = $this->createForm(UsersType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user = $form->getData();
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('users_index', [
                'id' => $asso->getId(),
            ]);
        }

        return $this->render('users/new.html.twig', [
            'user' => $user,
            'asso' => $asso,
            'activites' => $activites,
            'form' => $form->createView(),
        ]);
    }
    /**
     * @Route("/admin/user/{id}", name="users_show", methods={"GET"})
     */
    public function show(Users $user): Response
    {
        return $this->render('users/show.html.twig', [
            'user' => $user,
            'activite' => $user->getActiviteUser(),
            'asso'=>$asso       
        ]);
    }
    /**
     * @Route("/admin/user/{id}/edit", name="users_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Users $user): Response
    {
        $form = $this->createForm(UsersType::class, $user, $asso);
        $form->handleRequest($request);
        $utilisateur = $this->getUser()->getAssociationId();

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('users_index', [
                'id' => $utilisateur
            ]);
        }

        return $this->render('users/edit.html.twig', [
            'user' => $user,
            'activite' => $user->getActiviteUser(),
            'form' => $form->createView(),
        ]);
    }
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
        return $this->user;
    }
    /**
     * @Route("/admin/{id}/user", name="users_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Users $user): Response
    {
        $utilisateur = $this->getUser()->getAssociationId();
        if ($this->isCsrfTokenValid('delete'.$user->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($user);
            $entityManager->flush();
        }

        return $this->redirectToRoute('users_index', [
            'id' => $utilisateur
        ]);
    }
}
