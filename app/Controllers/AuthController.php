<?php 

namespace App\Controllers;
use App\Services\AuthService;

class AuthController{

    protected $authService;
     public function __construct()
     {
        $this->authService = new AuthService();
     }

     public function login()
     {
        $this->authService->googleAuthRedirect();
     }

     public function logout()
     {
        $this->authService->revoke();
     }

     public function googleCallback()
     {
        $this->authService->googleCallback();
     }

   
}