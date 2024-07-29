<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Blocks\HeaderBlock;
use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;

it('can be created', function (): void {
    expect(HeaderBlock::make('Test title of header block'))
        ->toBeInstanceOf(HeaderBlock::class)
        ->getContent()->toBe('Test title of header block');
});

test('cannot have elements', function (): void {
    expect(HeaderBlock::class)
        ->not->toUse([HandlesElements::class]);
});

test('can be represented as an array', function (): void {
    expect(HeaderBlock::make('Test title of header block')->toArray())
        ->toBeArray()
        ->type->toBe('header')
        ->text->scoped(
            fn (mixed $textArr) => $textArr
                ->toBeArray()
                ->type->toBe('plain_text')
                ->text->toBe('Test title of header block')
        );
});
