<?php

namespace Aku\Bugfixer;

use Illuminate\Support\Facades\Http;

class BugfixerClient
{
    public function sendError(array $payload)
    {
        if (!config('bugfixer.enabled')) {
            return;
        }

        $endpoint = config('bugfixer.endpoint');
        $apiKey   = config('bugfixer.api_key');

        Http::withToken($apiKey)
            ->post($endpoint . '/errors', $payload);
    }
}
