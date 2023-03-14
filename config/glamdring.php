<?php

return [
    'forge' => [
        /**
         * Forge to get user infos.
         * Can be: `github` or `gitlab`.
         */
        'type' => env('GLAMDRING_FORGE_TYPE', 'github'),
        /**
         * Username to fetch infos.
         */
        'username' => env('GLAMDRING_FORGE_USERNAME'),
        /**
         * API token to get access to account infos.
         */
        'token' => env('GLAMDRING_FORGE_TOKEN'),
    ],
    'token' => [
        'github' => env('GLAMDRING_TOKEN_GITHUB'),
        'gitlab' => env('GLAMDRING_TOKEN_GITLAB'),
        'bitbucket' => env('GLAMDRING_TOKEN_BITBUCKET'),
    ],
];
