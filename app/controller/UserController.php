<?php
namespace App\controller;
use App\core\Controller;

class UserController extends Controller {
    public function index() {
        $data = [
            'title' => 'Users'
        ];
        
        $this->view('pages/index', $data);
    }
}
?>