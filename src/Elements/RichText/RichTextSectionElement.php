<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Elements\RichText;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Contracts\HasElements;
use Hosttech\SlackBlockKitBuilder\Elements\AbstractElement;

class RichTextSectionElement extends AbstractElement implements HasElements
{
    use HandlesElements;

    protected string $type = 'rich_text_section';

    public function __construct() {}

    public static function make(): self
    {
        return new self;
    }

    public function allowedItemClasses(): array
    {
        return [
            RichTextItemTextElement::class,
            RichTextItemLinkElement::class,
        ];
    }
}
