<?php
/**
 * Created for  Adapter.
 * @author:     mhidalgo@summasolutions.net
 * Date:        01/07/15
 * Time:        16:31
 * @copyright   Copyright (c) 2015 Summa Solutions (http://www.summasolutions.net)
 */

interface SocialConnector
{
    /**
     * @return string
     */
    public function getTitle();
    /**
     * @return string
     */
    public function getLoginUrl();
    /**
     * @return string
     */
    public function getLogoutUrl();
    /**
     * @return array
     */
    public function getUserInfo();
}