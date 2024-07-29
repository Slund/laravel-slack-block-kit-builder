<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Blocks;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesRequiredContent;
use Illuminate\Support\Stringable;

class HeaderBlock extends AbstractBlock
{
    use HandlesRequiredContent;

    protected string $type = 'header';

    public function __construct(
        string|Stringable $content,
    ) {
        $this->content = $content;
    }

    public static function make(string|Stringable $content): HeaderBlock
    {
        return new self($content);
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'text' => [
                'type' => 'plain_text',
                'text' => $this->content,
            ],
        ];
    }
}
