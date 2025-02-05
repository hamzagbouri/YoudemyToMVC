<?php
namespace App\controller;
use App\core\Controller;
use App\Model\Categorie;
use App\Model\Cours;
use App\Model\Etudiant;

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
class HomeController extends Controller {
    public function index() {
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
    public function viewCours($id) {

        $cours = Cours::afficherParId($id);
        if($_SESSION['role'] == 'enseignant')
        {

            $cours = Cours::afficherParIdProf($id);
            $allEtudiants = Etudiant::getEtudiantsByCours($cours->getId());
            if($cours->getEnseignantId() == $id)
            {
                $mine = true;
            }
        }
        $this->view('client/viewCours', $cours);
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
    public function myfunction(...$data)
    {
        print_r($data);
    }
}
?>