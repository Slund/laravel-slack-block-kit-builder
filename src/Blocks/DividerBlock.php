<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Blocks;

class DividerBlock extends AbstractBlock
{
    protected string $type = 'divider';

    public function __construct(

    ) {}

    public static function make(): DividerBlock
    {
        return new self;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
        ];
    }
}
