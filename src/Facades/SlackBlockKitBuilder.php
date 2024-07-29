<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @method static \Hosttech\SlackBlockKitBuilder\SlackBlockKitBuilder make()
 *
 * @see \Hosttech\SlackBlockKitBuilder\SlackBlockKitBuilder
 */
class SlackBlockKitBuilder extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return \Hosttech\SlackBlockKitBuilder\SlackBlockKitBuilder::class;
    }
}
