<?php
/**
 * Created for  Adapter.
 * @author:     mhidalgo@summasolutions.net
 * Date:        03/07/15
 * Time:        16:18
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

class TestSocial
{
    public function socialTitle($social)
    {
        $title = '';
        $social = $this->_getSocial($social);
        if ($social instanceof SocialConnector) {
            $title = $social->getTitle();
        }
        return $title;
    }

    public function login($social)
    {
        $url = '';
        $social = $this->_getSocial($social);
        if ($social instanceof SocialConnector) {
            $url = $social->getLoginUrl();
        }
        return $url;
    }

    public function logout($social)
    {
        $url = '';
        $social = $this->_getSocial($social);
        if ($social instanceof SocialConnector) {
            $url = $social->getLogoutUrl();
            $_SESSION['social'] = '';
        }
        return $url;
    }

    public function userInfo($social)
    {
        $userInfo = array();
        $social = $this->_getSocial($social);
        if ($social instanceof SocialConnector) {
            $userInfo = $social->getUserInfo();
        }
        return $userInfo;
    }

    protected function _getSocial($social)
    {
        if (is_string($social)) {
            if(!isset($_SESSION['social']) || (isset($_SESSION['social']) && $_SESSION['social'] !== '')) {
                $_SESSION['social'] = $social;
            } elseif($_SESSION['social'] !== $social) {
                $social = $_SESSION['social'];
            }
            switch ($social){
                case 'facebook':
                    $social = new SocialFacebook();
                    break;
                case 'twitter':
                    $social = new SocialTwitter();
                    break;
                case 'googleplus':
                    $social = new SocialGooglePlus();
            }
        }
        return $social;
    }
}