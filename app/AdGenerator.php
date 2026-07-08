<?php
declare(strict_types=1);

require_once __DIR__ . '/TemplateAdGenerator.php';

class AdGenerator
{
    public function generate(array $input): array
    {
        $templateGenerator = new TemplateAdGenerator();

        return $templateGenerator->generate($input);
    }
}