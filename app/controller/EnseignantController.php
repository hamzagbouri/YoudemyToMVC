<?php
namespace App\controller;
use App\core\Controller;
use App\Model\Categorie;

class EnseignantController extends Controller {
    public function index() {
        $data = [];
        $data [] = Categorie::getAll();
        
        $this->view('client/enseignant/index', $data);
    }
    
}
?>