<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Concerns;

use Illuminate\Support\Stringable;

trait HandlesRequiredContent
{
    protected string|Stringable $content = '';

    public function content(string|Stringable $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): string|Stringable
    {
        return $this->content;
    }
}
