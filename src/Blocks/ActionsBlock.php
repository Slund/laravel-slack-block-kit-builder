<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Blocks;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Contracts\HasElements;
use Hosttech\SlackBlockKitBuilder\Elements\ActionElement;

class ActionsBlock extends AbstractBlock implements HasElements
{
    use HandlesElements;

    protected string $type = 'actions';

    public function __construct(

    ) {}

    public static function make(): ActionsBlock
    {
        return new self;
    }

    public function allowedItemClasses(): array
    {
        return [
            ActionElement::class,
        ];
    }
}
