<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Blocks;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Contracts\HasElements;
use Hosttech\SlackBlockKitBuilder\Elements\ContextElement;

class ContextBlock extends AbstractBlock implements HasElements
{
    use HandlesElements;

    protected string $type = 'context';

    public function __construct(
    ) {}

    public static function make(): ContextBlock
    {
        return new self;
    }

    public function allowedItemClasses(): array
    {
        return [
            ContextElement::class,
        ];
    }
}
