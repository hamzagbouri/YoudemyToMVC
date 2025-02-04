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