<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Elements;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Support\Traits\Conditionable;
use Illuminate\Support\Traits\Tappable;

abstract class AbstractElement implements Arrayable
{
    use Conditionable;
    use Tappable;
}
