<?php
/**
 * Created for  Adapter.
 * @author:     mhidalgo@summasolutions.net
 * Date:        01/07/15
 * Time:        16:39
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

class SocialTwitter
    implements SocialConnector
{
    public function getTitle()
    {
        return 'Twitter';
    }
    public function getLoginUrl()
    {
        return 'www.twitter.com/login';
    }
    public function getLogoutUrl()
    {
        return 'www.twitter.com/logout';
    }
    public function getUserInfo()
    {
        return array(
            'username' => 'pclider',
            'email' => '-', // Twitter doesn't send email from users.
            'first_name' => 'PC',
            'last_name' => 'Lider',
            'phone' => '1110000000',
            'address' => array(
                0 => 'Some Place, 111, Benito Juarez, Argentina, 7020',
            )
        );
    }
}