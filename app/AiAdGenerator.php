<?php
declare(strict_types=1);

class AiAdGenerator
{
    public function isAvailable(): bool
    {
        return false;
    }

    public function generate(array $input): array
    {
        throw new RuntimeException(
            'AI generation is not configured.'
        );
    }
}