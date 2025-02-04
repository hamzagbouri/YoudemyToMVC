<?php
namespace App\controller;
use App\core\Controller;
class AdminController extends Controller{
    public function index() {
        $data = [
            'title' => 'Welcome'
        ];
        
        $this->view('admin/index', $data);
        
    }
    public function test()
    {
        echo "test";
    }
}
?>