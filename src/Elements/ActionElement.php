<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Elements;

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesRequiredContent;
use Illuminate\Support\Arr;
use Illuminate\Support\Stringable;

class ActionElement extends AbstractElement
{
    use HandlesRequiredContent;

    protected string $type = 'button';

    public function __construct(
        string|Stringable $content,
        protected string|Stringable|null $url = null,
    ) {
        $this->content = $content;
    }

    public static function make(string $content, ?string $url = null): ActionElement
    {
        return new self($content, $url);
    }

    public function url(string|Stringable $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getUrl(): string|Stringable|null
    {
        return $this->url;
    }

    public function toArray(): array
    {
        $array = [
            'type' => $this->type,
            'text' => [
                'type' => 'plain_text',
                'text' => $this->content,
            ],
        ];

        if (! is_null($this->url)) {
            Arr::set($array, 'url', $this->url);
        }

        return $array;
    }
}
