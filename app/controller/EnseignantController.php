<?php
namespace App\controller;
use App\core\Controller;

class EnseignantController extends Controller {
    public function index() {
        $data = [
            'title' => 'Welcome'
        ];
        
        $this->view('client/enseignant/index', $data);
    }
    
}
?>