<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder;

use Hosttech\SlackBlockKitBuilder\Blocks\AbstractBlock;
use Illuminate\Support\Collection;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Tappable;

class SlackBlockKitBuilder
{
    use Conditionable;
    use Tappable;

    protected ?Collection $blocks = null;

    public function __construct(

    ) {
        $this->blocks = collect();
    }

    public static function make(): SlackBlockKitBuilder
    {
        return new self;
    }

    /** @param array<array-key, AbstractBlock> $blocks */
    public function blocks(array $blocks): self
    {
        $this->blocks = collect($blocks);

        return $this;
    }

    public function pushBlock(AbstractBlock $element): self
    {
        $this->blocks->push($element);

        return $this;
    }

    public function prependBlock(AbstractBlock $element): self
    {
        $this->blocks->prepend($element);

        return $this;
    }

    public function getBlocks(): array
    {
        return $this->blocks?->all() ?? [];
    }

    /** @return array<array-key, mixed> */
    public function toArray(): array
    {
        return [
            ...$this->blocks->transform(fn (AbstractBlock $block) => $block->toArray()),
        ];
    }
}
