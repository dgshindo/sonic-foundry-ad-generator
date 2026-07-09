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
        throw new RuntimeException(
            'AI generation is configured but generation is not implemented yet.'
        );
    }
}