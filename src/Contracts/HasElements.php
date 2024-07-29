<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Contracts;

interface HasElements
{
    /** @return array<array-key, class-string> */
    public function allowedItemClasses(): array;
}
