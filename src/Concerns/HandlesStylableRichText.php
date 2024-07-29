<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Concerns;

use Illuminate\Support\Arr;

trait HandlesStylableRichText
{
    protected bool $bold = false;

    protected bool $italic = false;

    public function bold(bool $bold = true): self
    {
        $this->bold = $bold;

        return $this;
    }

    public function getBold(): bool
    {
        return $this->bold;
    }

    public function italic(bool $italic = true): self
    {
        $this->italic = $italic;

        return $this;
    }

    public function getItalic(): bool
    {
        return $this->italic;
    }

    /** @param array<string, mixed> $array */
    private function handleStyleArrayKey(array &$array): void
    {
        if ($this->bold) {
            Arr::set($array, 'style.bold', true);
        }

        if ($this->italic) {
            Arr::set($array, 'style.italic', true);
        }
    }
}
