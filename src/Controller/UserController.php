<?php

namespace App\Controller;

use App\Form\UserType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;

class UserController extends AbstractController
{
    #[Route('/create/user', name: 'createUser')]
    public function insertUser(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $hasher) {
        $form = $this -> createForm(UserType::class);
        $form -> handleRequest($request);
        if ($form -> isSubmitted() && $form -> isValid()) {
            $user = $form -> getData();
            $password = $user -> getPassword();
            $encode = $hasher -> hashPassword($user, $password);
            $user -> setPassword($encode);
            $doctrine -> persist($user);
            $doctrine -> flush();
            $this -> addFlash("success", "Usuario añadido correctamente");
            return $this -> redirectToRoute("listPark");
        }
        return $this -> renderForm("user/createUser.html.twig", [
            "userForm" => $form
        ]);
    }

    #[Route('/create/admin', name: 'createAdmin')]
    public function insertAdmin(Request $request, EntityManagerInterface $doctrine, UserPasswordHasherInterface $hasher) {
        $form = $this -> createForm(UserType::class);
        $form -> handleRequest($request);
        if ($form -> isSubmitted() && $form -> isValid()) {
            $user = $form -> getData();
            $password = $user -> getPassword();
            $encode = $hasher -> hashPassword($user, $password);
            $user -> setPassword($encode);
            $user -> setRoles(["ROLE_ADMIN", "ROLE_USER"]);
            $doctrine -> persist($user);
            $doctrine -> flush();
            $this -> addFlash("success", "Usuario añadido correctamente");
            return $this -> redirectToRoute("listPark");
        }
        return $this -> renderForm("user/createUser.html.twig", [
            "userForm" => $form
        ]);
    }
}
