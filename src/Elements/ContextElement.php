<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Elements;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesRequiredContent;
use Illuminate\Support\Stringable;

class ContextElement extends AbstractElement
{
    use HandlesRequiredContent;

    final public const TypeMarkdown = 'mrkdwn';

    final public const TypeText = 'text';

    protected string $type = self::TypeMarkdown;

    public function __construct(
        string|Stringable $content,
    ) {
        $this->content = $content;
    }

    public static function make(string|Stringable $content): ContextElement
    {
        return new self($content);
    }

    public function type(string $textBlockType): self
    {
        if (! in_array($textBlockType, [self::TypeText, self::TypeMarkdown])) {
            return $this;
        }

        $this->type = $textBlockType;

        return $this;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'text' => $this->content,
        ];
    }
}
