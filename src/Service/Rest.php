<?php

namespace App\Service;

use Unirest\Request;

class Rest
{
    private $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function send(string $path, array $headers, array $query, string $verb)
    {
        switch ($verb) {
            case "GET":
                $response = $this->request->get($path, $headers, $query);
                break;
            case "POST":
                $response = $this->request->post($path, $headers, $query);
                break;
            case "PUT":
                $response = $this->request->put($path, $headers, $query);
                break;
            case "DELETE":
                $response = $this->request->delete($path, $headers, $query);
                break;
            case "PATCH":
                $response = $this->request->patch($path, $headers, $query);
            default:
                return "invalid HTTP verb, use 'GET', 'PUT', 'POST', 'DELETE' or 'PATCH'";
        }

        $response->code;        // HTTP Status code
        $response->headers;     // Headers
        $response->body;        // Parsed body
        $response->raw_body;    // Unparsed body

        return $response;
    }
}
