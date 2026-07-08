<?php
declare(strict_types=1);

class TemplateAdGenerator
{
    public function generate(array $input): array
    {
         $productName = $input['product_name'];
        $audience = $input['audience'];
        $tone = $input['tone'];
        $platform = $input['platform'];
        $price = $input['price'];
        $salesUrl = $input['sales_url'];

        return [
            'angles' => [
                "Turn your music ideas into finished songs with {$productName}.",
                "Stop staring at blank lyric pages and start building songs with structure.",
                "For creators who have song ideas but need help shaping them into something release-ready.",
            ],

            'headlines' => [
                "Build Better Songs Faster",
                "Your Next Song Starts Here",
                "From Idea to Finished Track",
                "A Songwriting Guide for Modern Creators",
                "Make Your Music Ideas Real",
            ],

            'captions' => [
                "{$productName} helps creators turn rough song ideas into structured, polished lyrics and production-ready concepts.",
                "If you have melodies, hooks, or fragments sitting unfinished, {$productName} gives you a practical way to move them forward.",
                "Built for independent creators, lyric writers, AI music users, and anyone ready to stop guessing their way through songs.",
            ],

            'ctas' => [
                "Get the e-book",
                "Start building better songs",
                "Download your copy",
                "Turn ideas into songs",
                "Begin your next track",
            ],

            'image_prompts' => [
                "A cinematic studio desk with headphones, notebook pages, glowing waveform on a monitor, warm dramatic lighting, premium e-book advertisement, no text.",
                "A songwriter's workspace at night, coffee, lyric notebook, guitar, laptop showing music production software, cinematic shallow depth of field, no text.",
                "Modern independent musician creating music in a home studio, moody lighting, professional creative atmosphere, high-resolution ad image, no text.",
            ],

            'short_scripts' => [
                [
                    'hook' => "You have a song idea. Now what?",
                    'body' => "{$productName} helps you turn that idea into lyrics, structure, and a track concept you can actually finish.",
                    'cta' => "Get the e-book and start building.",
                ],
                [
                    'hook' => "Stop letting unfinished songs pile up.",
                    'body' => "Use a repeatable creative process to shape hooks, lyrics, and production direction.",
                    'cta' => "Download {$productName}.",
                ],
                [
                    'hook' => "AI can generate music. But you still need direction.",
                    'body' => "{$productName} helps you think like the creative director of your own songs.",
                    'cta' => "Start with the guide.",
                ],
            ],
        ];
    }
}