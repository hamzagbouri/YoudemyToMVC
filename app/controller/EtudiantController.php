<?php
namespace App\controller;
use App\core\Controller;
use App\Model\Categorie;

class EtudiantController extends Controller {
    public function index() {
        $data = [];
        $data [] = Categorie::getAll();
        $this->view('client/etudiant/index', $data);
    }
    public function add()
    {
        $content = $_POST;
        print_r($content);

    }
    
}
?>