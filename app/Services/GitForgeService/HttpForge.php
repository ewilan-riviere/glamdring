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
    ) {
    }

    public static function create(string $api_url, string $api_token): HttpForge
    {
        return new HttpForge($api_url, $api_token);
    }

    public function get(string $endpoint)
    {
        $this->url = "{$this->api_url}{$endpoint}";
        $this->response = Http::withHeaders([
            'Authorization' => "token {$this->api_token}",
        ])->get($this->url);
        $this->valid = $this->response->status() == 200;
        $this->body = json_decode($this->response->body());

        return $this;
    }
}
