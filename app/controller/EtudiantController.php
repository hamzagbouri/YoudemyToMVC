<?php
namespace App\controller;
use App\core\Controller;

class EtudiantController extends Controller {
    public function index() {
        $data = [
            'title' => 'Welcome'
        ];
        
        $this->view('client/etudiant/index', $data);
    }
    public function add()
    {
        $content = $_POST;
        print_r($content);

    }
    
}
?>