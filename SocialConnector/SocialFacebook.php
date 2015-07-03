<?php
/**
 * Created for  Adapter.
 * @author:     mhidalgo@summasolutions.net
 * Date:        01/07/15
 * Time:        16:39
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

class SocialFacebook
    implements SocialConnector
{
    public function getTitle()
    {
        return 'Facebook';
    }
    public function getLoginUrl()
    {
        return 'www.facebook.com/';
    }
    public function getLogoutUrl()
    {
        return 'www.facebook.com/logout';
    }
    public function getUserInfo()
    {
        return array(
            'username' => 'matias.hidalgo92',
            'email' => 'chuj4pr0@summasolutions.net',
            'first_name' => 'Matias',
            'last_name' => 'Hidalgo',
            'phone' => '1110000000',
            'address' => array(
                0 => 'Paz, 111, Benito Juarez, Argentina, 7020',
                1 => 'Santamarina, 876, Tandil, Argentina, 7000'
            )
        );
    }
}