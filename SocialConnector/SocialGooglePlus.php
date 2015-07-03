<?php
/**
 * Created for  Adapter.
 * @author:     mhidalgo@summasolutions.net
 * Date:        01/07/15
 * Time:        16:39
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

class SocialGooglePlus
    implements SocialConnector
{
    public function getTitle()
    {
        return 'Google Plus';
    }
    public function getLoginUrl()
    {
        return 'accounts.google.com/login';
    }
    public function getLogoutUrl()
    {
        return 'accounts.google.com/logout';
    }
    public function getUserInfo()
    {
        return array(
            'username' => 'mhidalgo',
            'email' => 'mmhidalgo@summasolutions.net',
            'first_name' => 'Matias',
            'last_name' => 'Hidalgo',
            'phone' => '1110000000',
            'address' => array(
                0 => 'Santamarina, 876, Tandil, Argentina, 7000'
            )
        );
    }
}