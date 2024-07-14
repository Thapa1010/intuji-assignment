<?php 

namespace App\Services;

use App\Helper\Session;
use Exception;
use Google\Client;
use Google\Service\Calendar;

class AuthService
{
    protected Client $googleclient;

    public function __construct()
    {
        $this->googleclient = new Client();
        $this->googleclient->setAuthConfig(__DIR__.'/../../google-config.json');
        $this->googleclient->addScope(Calendar::CALENDAR);    
    }

    public function googleAuthRedirect()
    {
        $OauthUrl = $this->googleclient->createAuthUrl();
        header('Location:'.$OauthUrl);
    }

    public function googleCallback()
    {
        try{
            $access_token = $_GET['code'];

            if(!empty($access_token)){
                putSession('google_auth_code',$access_token);
            }

            $oauth_token = $this->googleclient->fetchAccessTokenWithAuthCode($access_token);
            if(!empty($oauth_token)){
                $_SESSION['google_oauth_token'] = $oauth_token;
            }

            putSession('success_message','Signed in with google');
        }catch(Exception $e){
            putSession('error_message',$e->getMessage());
            header('Location:' .'/');
        }

        header('Location:' . '/');


    }

    public function revoke(){

        putSession('success_message','Signed out!');
        $this->googleclient->revokeToken();
        session_destroy();
        header('Location:' . '/');
    }

}