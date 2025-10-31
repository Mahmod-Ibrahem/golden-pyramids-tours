<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class Translator
{
    public function translate(mixed $text, array $to, ?string $from = null): array
    {
        $base = rtrim(env('AZURE_TRANSLATOR_ENDPOINT', ''), '/'); // no trailing slash
        $endpoint = $base.'/translate';

        $headers = [
            'Ocp-Apim-Subscription-Key' => env('AZURE_TRANSLATOR_KEY'),
            'Content-Type'              => 'application/json',
        ];

        if ($region = env('AZURE_TRANSLATOR_REGION')) {
            $headers['Ocp-Apim-Subscription-Region'] = $region; // e.g., southafricanorth
        }

        $query = array_filter([
            'api-version' => '3.0',
            'from'        => $from,
            'to'          => $to,
        ]);

        // Build the body for one or many texts
        $body = collect((array) $text)
            ->map(fn ($t) => ['Text' => $t])
            ->values()
            ->all();
        $resp = Http::withHeaders($headers)
            ->withQueryParameters($query)              // <-- attach the query string
            ->timeout(10)
            ->retry(2, 300)
            ->post($endpoint,$body);

        $resp->throw(); // throws RequestException on 4xx/5xx
        return $resp->json();
    }
}
