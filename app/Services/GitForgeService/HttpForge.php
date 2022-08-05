<?php

namespace App\Services\GitForgeService;

use Http;

class HttpForge
{
    public string $url;

    public \Illuminate\Http\Client\Response $response;

    public bool $valid = false;

    public mixed $body;

    public function __construct(
        public string $api_url,
        public string $api_token,
        public array $headers,
    ) {
    }

    public static function create(IGitForge $forge): HttpForge
    {
        return new HttpForge($forge->api_url, $forge->service->api_token, $forge->getHeaders());
    }

    public function get(string $endpoint)
    {
        $this->url = "{$this->api_url}{$endpoint}";
        $this->response = Http::withHeaders($this->headers)
            ->get($this->url)
        ;
        $this->valid = $this->response->status() == 200;
        $this->body = json_decode($this->response->body());

        return $this;
    }
}
