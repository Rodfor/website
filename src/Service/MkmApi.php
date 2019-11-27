<?php

namespace App\Service;

use App\Service\Rest;

class MkmApi
{
    private $rest;

    public function __construct(Rest $rest)
    {
        $this->rest = $rest;
    }

    public function get($url)
    {
        $query = array();
        $headers = $this->getAuth();

        $response = $this->rest->send($url, $headers, $query, 'GET');


        return $response;
    }

    public function getAuth()
    {
        /**
         * Declare and assign all needed variables for the request and the header
         *
         * @var $method string Request method
         * @var $url string Full request URI
         * @var $appToken string App token found at the profile page
         * @var $appSecret string App secret found at the profile page
         * @var $accessToken string Access token found at the profile page (or retrieved from the /access request)
         * @var $accessSecret string Access token secret found at the profile page (or retrieved from the /access request)
         * @var $nonce string Custom made unique string, you can use uniqid() for this
         * @var $timestamp string Actual UNIX time stamp, you can use time() for this
         * @var $signatureMethod string Cryptographic hash function used for signing the base string with the signature, always HMAC-SHA1
         * @var version string OAuth version, currently 1.0
         */
        $method             = "GET";
        $url                = "https://sandbox.cardmarket.com/ws/v2.0/account";
        $appToken           = "PZHbaqr1INFbmvJm";
        $appSecret          = "TRB7V9mtoVKjAzhY67ZIXzeSHlZ1AKSC";
        $accessToken        = "qY7ea9ji4qmgNZHUhmr8Qe1a5B03ifgO";
        $accessSecret       = "qB8GJjfytwwvEXgkUQ3SS34ZJeuAEiUF";
        $nonce              = uniqid();
        $timestamp          = time();
        $signatureMethod    = "HMAC-SHA1";
        $version            = "1.0";

        /**
         * Gather all parameters that need to be included in the Authorization header and are know yet
         *
         * Attention: If you have query parameters, they MUST also be part of this array!
         *
         * @var $params array|string[] Associative array of all needed authorization header parameters
         */
        $params = array(
            'realm'                     => $url,
            'oauth_consumer_key'        => $appToken,
            'oauth_token'               => $accessToken,
            'oauth_nonce'               => $nonce,
            'oauth_timestamp'           => $timestamp,
            'oauth_signature_method'    => $signatureMethod,
            'oauth_version'             => $version,
        );

        /**
         * Start composing the base string from the method and request URI
         *
         * Attention: If you have query parameters, don't include them in the URI
         *
         * @var $baseString string Finally the encoded base string for that request, that needs to be signed
         */
        $baseString = strtoupper($method) . "&";
        $baseString .= rawurlencode($url) . "&";

        /*
         * Gather, encode, and sort the base string parameters
         */
        $encodedParams = array();
        foreach ($params as $key => $value) {
            if ("realm" != $key) {
                $encodedParams[rawurlencode($key)] = rawurlencode($value);
            }
        }
        ksort($encodedParams);

        /*
         * Expand the base string by the encoded parameter=value pairs
         */
        $values = array();
        foreach ($encodedParams as $key => $value) {
            $values[] = $key . "=" . $value;
        }
        $paramsString = implode("&", $values);
        $baseString .= rawurlencode($paramsString);

        /*
         * Create the signingKey
         */
        $signatureKey = rawurlencode($appSecret) . "&" . rawurlencode($accessSecret);

        /**
         * Create the OAuth signature
         * Attention: Make sure to provide the binary data to the Base64 encoder
         *
         * @var $oAuthSignature string OAuth signature value
         */
        $rawSignature = hash_hmac("sha1", $baseString, $signatureKey, true);
        $oAuthSignature = base64_encode($rawSignature);

        /*
         * Include the OAuth signature parameter in the header parameters array
         */
        $params['oauth_signature'] = $oAuthSignature;

        /*
         * Construct the header string
         */
        $header = "Authorization: OAuth ";
        foreach ($params as $key => $value) {
            $headerParams[] = $key . "=\"" . $value . "\"";
        }
        $header .= implode(", ", $headerParams);

        $headerArray = array($header);

        return $headerArray;
    }
}
