<?php

namespace App\controller;

use App\core\Controller;

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
        }

    }
}