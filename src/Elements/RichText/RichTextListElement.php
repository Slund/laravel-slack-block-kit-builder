<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Elements\RichText;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Contracts\HasElements;
use Hosttech\SlackBlockKitBuilder\Elements\AbstractElement;

class RichTextListElement extends AbstractElement implements HasElements
{
    use HandlesElements;

    protected string $type = 'rich_text_list';

    protected string $style = 'bullet';

    protected int $indent = 0;

    protected int $offset = 0;

    protected int $border = 0;

    public function __construct() {}

    public static function make(): self
    {
        return new self;
    }

    public function indent(int $indent): self
    {
        $this->indent = $indent;

        return $this;
    }

    public function getIndent(): int
    {
        return $this->indent;
    }

    public function offset(int $offset): self
    {
        $this->offset = $offset;

        return $this;
    }

    public function getOffset(): int
    {
        return $this->offset;
    }

    public function border(int $border): self
    {
        $this->border = $border;

        return $this;
    }

    public function getBorder(): int
    {
        return $this->border;
    }

    /** @return array{type: string, elements: array<array-key, mixed>, style: string, indent: int, border: int, offset: int} */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'elements' => $this->getElementsArrayed() ?? [],
            'style' => $this->style,
            'indent' => $this->indent,
            'border' => $this->border,
            'offset' => $this->offset,
        ];
    }

    public function allowedItemClasses(): array
    {
        return [
            RichTextSectionElement::class,
        ];
    }
}
