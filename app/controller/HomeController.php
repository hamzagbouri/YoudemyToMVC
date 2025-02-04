<?php
namespace App\controller;
use App\core\Controller;

class HomeController extends Controller {
    public function index() {
        $data = [
            'title' => 'Welcome'
        ];
        
        $this->view('client/index', $data);
    }
    
}
?>