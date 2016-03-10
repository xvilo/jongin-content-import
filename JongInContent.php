<?php

/**
 * Created by PhpStorm.
 * User: henk
 * Date: 1/28/16
 * Time: 9:34 AM
 */
class JongInContent
{
    public static function retrieve( $key )
    {
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_URL, "https://api.opvoedenin.nl/api/$key" );
        curl_setopt( $ch, CURLOPT_REFERER, $_SERVER['SERVER_NAME'] );
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );

        $response = curl_exec( $ch );
        curl_close( $ch );
        return $response;
    }
}