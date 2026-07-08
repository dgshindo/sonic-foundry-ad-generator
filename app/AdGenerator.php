<?php
declare(strict_types=1);

require_once __DIR__ . '/TemplateAdGenerator.php';
require_once __DIR__ . '/AiAdGenerator.php';

class AdGenerator
{
    private TemplateAdGenerator $templateGenerator;
    private AiAdGenerator $aiGenerator;

    public function __construct()
    {
        $this->templateGenerator =
            new TemplateAdGenerator();

        $this->aiGenerator =
            new AiAdGenerator();
    }

    public function generate(array $input): array
    {
        if ($this->aiGenerator->isAvailable()) {
            try {
                return $this->aiGenerator->generate($input);
            } catch (Throwable $error) {
                error_log(
                    'AI generation failed: ' .
                    $error->getMessage()
                );
            }
        }

        return $this->templateGenerator->generate($input);
    }
}