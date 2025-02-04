<?php

namespace App\controller;

use App\core\Controller;
use App\Model\Enseignant;
use App\Model\Etudiant;
use App\Model\Admin;

class AuthController extends Controller
{
    public function login() {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          print_r($_POST);
      }
    }
    public function signup() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            print_r($_POST);
            $email = trim(htmlspecialchars($_POST['email-signup']));
            $password = trim(htmlspecialchars($_POST['password-signup']));
            $fullName = trim(htmlspecialchars($_POST['fullName-signup']));
            $role = trim(htmlspecialchars($_POST['role-signup']));

            if ($role === 'etudiant') {
                $res = Etudiant::signup($fullName, $email, $password, $role);
            } else if ($role === 'enseignant') {
                $res = Enseignant::signup($fullName, $email, $password, $role, false);
            } else {
                $_SESSION['message'] = "Invalid role selected";
                $_SESSION['message_type'] = "error";
                header("Location: /Youdemy-mvc/home/signup");
                exit;
            }

            if ($res) {
                $_SESSION['message_type'] = "success";
                $_SESSION['message'] = "Signup successful! Please log in.";
                header("Location: /Youdemy-mvc/home/login");

            } else {
                $_SESSION['message_type'] = "error";
                $_SESSION['message'] = "Email already exists";
                header("Location: /Youdemy-mvc/home/signup");

            }
            exit;
        }

    }
}