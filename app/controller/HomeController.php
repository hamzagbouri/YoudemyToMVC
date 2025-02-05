<?php
namespace App\controller;
use App\core\Controller;
use App\Model\Categorie;
use App\Model\Cours;
session_start();
class HomeController extends Controller {
    public function index() {
        $date = [];
      $data[] = Cours::afficherDeux();
      $data[] = Categorie::getAll();
      $this->view('client/index', $data);
    }
    public function cours() {
        $isEtudiant = false;
        if(isset($_SESSION['role']) && $_SESSION['role'] == 'etudiant' )
        {
            $isEtudiant = true;
            $idLog = $_SESSION['logged_id'];
        }
        $date = [];
        $data[] = Cours::afficherCoursPagination(0);
        $data[] = Categorie::getAll();
        $totalCours = Cours::totalCours();
        $totalPage = ceil($totalCours / 6);
        $data[] = $totalPage;
        $this->view('client/cours', $data);
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