<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Blocks;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Contracts\HasElements;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextListElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextSectionElement;

class RichTextBlock extends AbstractBlock implements HasElements
{
    use HandlesElements;

    protected string $type = 'rich_text';

    public function __construct() {}

    public static function make(): RichTextBlock
    {
        return new self;
    }

    public function allowedItemClasses(): array
    {
        return [
            RichTextSectionElement::class,
            RichTextListElement::class,
        ];
    }
}
