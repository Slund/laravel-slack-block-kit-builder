<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Concerns;

use Illuminate\Support\Stringable;

trait HandlesOptionalContent
{
    protected string|Stringable|null $content = null;

    public function content(string|Stringable|null $content): self
    {
        $this->content = $content;

        return $this;
    }

    public function getContent(): string|Stringable|null
    {
        return $this->content;
    }
}
