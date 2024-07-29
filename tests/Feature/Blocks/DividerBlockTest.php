<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Blocks\DividerBlock;
use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;

it('can be created', function (): void {
    expect(DividerBlock::make())
        ->toBeInstanceOf(DividerBlock::class);
});

test('cannot have elements', function (): void {
    expect(DividerBlock::class)
        ->not->toUse([HandlesElements::class]);
});

test('can be represented as an array', function (): void {
    expect(DividerBlock::make()->toArray())
        ->toBeArray()
        ->type->toBe('divider');
});
