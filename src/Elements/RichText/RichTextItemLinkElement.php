<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Elements\RichText;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesOptionalContent;
use Hosttech\SlackBlockKitBuilder\Concerns\HandlesStylableRichText;
use Hosttech\SlackBlockKitBuilder\Elements\AbstractElement;
use Illuminate\Support\Arr;
use Illuminate\Support\Stringable;

class RichTextItemLinkElement extends AbstractElement
{
    use HandlesOptionalContent;
    use HandlesStylableRichText;

    protected string $type = 'link';

    protected ?bool $unsafe = null;

    public function __construct(
        protected string|Stringable $url,
    ) {}

    public static function make(string|Stringable $url): RichTextItemLinkElement
    {
        return new self($url);
    }

    public function getUrl(): string|Stringable
    {
        return $this->url;
    }

    public function unsafe(bool $isUnsafe): self
    {
        $this->unsafe = $isUnsafe;

        return $this;
    }

    public function getUnsafe(): ?bool
    {
        return $this->unsafe;
    }

    public function toArray(): array
    {
        $array = [
            'type' => $this->type,
            'text' => $this->content ?? '',
            'url' => $this->url,
        ];

        if (is_bool($this->unsafe)) {
            Arr::set($array, 'unsafe', $this->unsafe);
        }

        $this->handleStyleArrayKey($array);

        return $array;
    }
}
