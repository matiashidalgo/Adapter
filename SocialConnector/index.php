<?php
/**
 * Created for  Adapter.
 * @author:     mhidalgo@summasolutions.net
 * Date:        01/07/15
 * Time:        16:36
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

require '../autoload.php';
session_start();

class TestSocialLogin
{
    public function login($social)
    {
        $url = '';
        switch ($social){
            case 'facebook':
                $fb = new SocialFacebook();
                $url = $fb->getLoginUrl();
                break;
            case 'twitter':
                $tw = new SocialTwitter();
                $url = $tw->getLoginUrl();
                break;
            case 'googleplus':
                $gl = new SocialGooglePlus();
                $url = $gl->getLoginUrl();
        }
        return $url;
    }
}
$urlToLogin = '';
$socialLogin = new TestSocialLogin();
if($_GET['social']) {
    $urlToLogin = $socialLogin->login($_GET['social']);
}
if($urlToLogin) {
    header('Location: '.$urlToLogin);
} else {

}