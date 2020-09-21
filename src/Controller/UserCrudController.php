<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class UserCrudController extends AbstractController
{
    /**
     * @Route("/users", name="users_index")
     */
    public function index(UserRepository $userRepository)
    {
        $users = $userRepository->findAll();
        return $this->render('user_crud/index.html.twig', [
            "users"=>$users
        ]);
    }
    /**
     * @Route("/users/create", name="users_create")
     */
    public function create(Request $request) {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        //dump($user);
        if($form->isSubmitted()&&$form->isValid()){
            $em = $this-> getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();
            return $this->redirectToRoute("users_read",["user"=>$user->getId()]);
        }
        return $this ->render("user_crud/create.html.twig", [
            "myForm"=> $form->createView()
        ]);
    }

    /**
     * @Route("users/{user}", name="users_read")
     */
    public function read(User $user) {
        return $this->render("user_crud/read.html.twig",[
            "user" => $user
        ]);
    }

    /**
     * @Route("/users/{user}/delete", name="user_delete")
     */
    public function delete (User $user) {
        $em = $this->getDoctrine()->getManager();
        $em->remove($user);
        $em->flush();
        return $this-> redirectToRoute(("users_index"));
    }
}
