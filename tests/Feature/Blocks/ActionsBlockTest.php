<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Blocks\ActionsBlock;
use Hosttech\SlackBlockKitBuilder\Elements\ActionElement;
use Hosttech\SlackBlockKitBuilder\Elements\ContextElement;

beforeEach(fn () => $this->block = ActionsBlock::make());

it('can be created', function (): void {
    expect($this->block)
        ->toBeInstanceOf(ActionsBlock::class);
});

test('can be represented as an array', function (): void {
    expect($this->block->toArray())
        ->toBeArray()
        ->type->toBe('actions')
        ->elements->scoped(
            fn (mixed $elements) => $elements
                ->toBeArray()
                ->toBeEmpty()
        );
});

it('does only allow certain elements', function (): void {
    $this->block->elements([
        ActionElement::make('Test'),
        ContextElement::make('Test'),
    ]);

    expect($this->block)
        ->getElements()
        ->scoped(
            fn (mixed $elements) => $elements
                ->toHaveCount(1)
                ->{0}->toBeInstanceOf(ActionElement::class)
        );
});
