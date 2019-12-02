<?php

namespace App\Service;

use App\Service\MkmApi;
use App\Service\Rest;

class MkmArticle
{
    private $rest;
    public const URL = 'https://sandbox.cardmarket.com/ws/v2.0/';

    public function __construct(Rest $rest, MkmApi $mkm)
    {
        $this->rest = $rest;
        $this->mkm = $mkm;
    }

    public function getStock()
    {
        $url = self::URL . 'stock';

        return $this->rest->send($url, $this->mkm->getAuth($url), [], 'GET');
    }

    public function getArticle(string $id)
    {
        $url = self::URL . 'stock/article/' . $id;

        return $this->rest->send($url, $this->mkm->getAuth($url), [], 'GET');
    }

    public function getProduct(string $id)
    {
        $url = self::URL . 'products/' . $id;

        return $this->rest->send($url, $this->mkm->getAuth($url), [], 'GET');
    }
}
