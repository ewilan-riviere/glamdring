<?php

namespace App\Services\GitForge;

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

    public function setUrl(string $endpoint, array $query_params = []): string
    {
        $query_params_str = '';

        if (! empty($query_params)) {
            foreach ($query_params as $key => $value) {
                $query_params_str .= "{$key}={$value}&";
            }

            $query_params_str = "?{$query_params_str}";
        }

        return "{$this->api_url}{$endpoint}{$query_params_str}";
    }

    public function get(string $endpoint, array $query_params = [])
    {
        $this->url = $this->setUrl($endpoint, $query_params);
        $this->response = Http::withHeaders($this->headers)
            ->get($this->url)
        ;
        $this->valid = $this->response->status() == 200;
        $this->body = json_decode($this->response->body());

        return $this;
    }
}
