<?php
namespace App\controller;
use App\core\Controller;
use App\Model\Categorie;
use App\Model\Cours;

class HomeController extends Controller {
    public function index() {
        $date = [];
      $data[] = Cours::afficherDeux();
      $data[] = Categorie::getAll();
      $this->view('client/index', $data);
    }
    public function login() {
        $data = [
            'title' => 'Welcome'
        ];

        $this->view('login', $data);
    }
    public function signup() {
        $data = [
            'title' => 'Welcome'
        ];

        $this->view('signup', $data);
    }
}
?>