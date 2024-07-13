<?php 

namespace App\Controllers;

class BaseController{

    public function index(){
        include_once(__DIR__.'/../../views/main.php');
    }
}