<?php


namespace App\Controller;


use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DemoController extends AbstractController
{
    /**
     * @Route("/bonjour/{id}", name="bonjour")
     */

    public function sayHello(User $user) {
        //return new Response("Hello World");
        //$user = $userRepository->find($id);
        dump($user);
        return $this->render("say_hello.html.twig",[
            "title"=> "Bonjour à tous",
            "user"=> $user
        ]); // pour renvoyer au template
    }
}