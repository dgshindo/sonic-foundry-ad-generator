<?php
declare(strict_types=1);

require_once __DIR__ . '/config.php';

class AiAdGenerator
{
    public function isAvailable(): bool
    {
        return (bool) config('OPENAI_API_KEY');
    }

    public function generate(array $input): array
    {
        $apiKey = (string) config('OPENAI_API_KEY');

        $prompt = $this->buildPrompt($input);

        $payload = [
            'model' => 'gpt-4.1-mini',
            'input' => $prompt,
            'max_output_tokens' => 2500,
        ];

        $response = $this->sendRequest($apiKey, $payload);

        $campaign = $this->extractCampaignJson($response);

        $this->validateCampaign($campaign);

        return $campaign;
    }

    private function buildPrompt(array $input): string
    {
        return <<<PROMPT
You are an expert direct-response ad strategist.

Create an advertising campaign for this product.

Product Name:
{$input['product_name']}

Description:
{$input['description']}

Target Audience:
{$input['audience']}

Tone:
{$input['tone']}

Platform:
{$input['platform']}

Price / Offer:
{$input['price']}

Sales URL:
{$input['sales_url']}

Return ONLY valid JSON with this exact structure:

{
  "angles": ["...", "...", "..."],
  "headlines": ["...", "...", "...", "...", "..."],
  "captions": ["...", "...", "..."],
  "ctas": ["...", "...", "...", "...", "..."],
  "image_prompts": ["...", "...", "..."],
  "short_scripts": [
    {
      "hook": "...",
      "body": "...",
      "cta": "..."
    },
    {
      "hook": "...",
      "body": "...",
      "cta": "..."
    },
    {
      "hook": "...",
      "body": "...",
      "cta": "..."
    }
  ]
}

Rules:
- No markdown.
- No code fences.
- No commentary.
- No fake testimonials.
- No guaranteed income claims.
- Make the copy specific to the product.
- Image prompts must say "no text".
PROMPT;
    }

    private function sendRequest(string $apiKey, array $payload): array
    {
        $curl = curl_init('https://api.openai.com/v1/responses');

        curl_setopt_array($curl, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: Bearer ' . $apiKey,
                'Content-Type: application/json',
            ],
            CURLOPT_POSTFIELDS => json_encode($payload),
            CURLOPT_TIMEOUT => 60,
        ]);

        $rawResponse = curl_exec($curl);

        if ($rawResponse === false) {
            $error = curl_error($curl);
            curl_close($curl);

            throw new RuntimeException('cURL error: ' . $error);
        }

        $statusCode = curl_getinfo($curl, CURLINFO_HTTP_CODE);

        curl_close($curl);

        $data = json_decode($rawResponse, true);

        if ($statusCode < 200 || $statusCode >= 300) {
            throw new RuntimeException(
                'OpenAI API error: ' . $rawResponse
            );
        }

        if (!is_array($data)) {
            throw new RuntimeException('Invalid API JSON response.');
        }

        return $data;
    }

    private function extractCampaignJson(array $response): array
    {
        $text = $response['output'][0]['content'][0]['text'] ?? null;

        if (!is_string($text)) {
            throw new RuntimeException('Could not find text output.');
        }

        $campaign = json_decode($text, true);

        if (!is_array($campaign)) {
            throw new RuntimeException('AI response was not valid JSON.');
        }

        return $campaign;
    }

    private function validateCampaign(array $campaign): void
    {
        $requiredListKeys = [
            'angles',
            'headlines',
            'captions',
            'ctas',
            'image_prompts',
            'short_scripts',
        ];

        foreach ($requiredListKeys as $key) {
            if (!isset($campaign[$key]) || !is_array($campaign[$key])) {
                throw new RuntimeException("Missing or invalid {$key}.");
            }
        }

        foreach ($campaign['short_scripts'] as $script) {
            if (
                !is_array($script) ||
                !isset($script['hook'], $script['body'], $script['cta'])
            ) {
                throw new RuntimeException('Invalid short script format.');
            }
        }
    }
}