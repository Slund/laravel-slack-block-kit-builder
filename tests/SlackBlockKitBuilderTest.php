<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Blocks\ActionsBlock;
use Hosttech\SlackBlockKitBuilder\Blocks\ContextBlock;
use Hosttech\SlackBlockKitBuilder\Blocks\DividerBlock;
use Hosttech\SlackBlockKitBuilder\Blocks\HeaderBlock;
use Hosttech\SlackBlockKitBuilder\Blocks\RichTextBlock;
use Hosttech\SlackBlockKitBuilder\SlackBlockKitBuilder;

beforeEach(fn () => $this->builder = SlackBlockKitBuilder::make());

it('can be created', function (): void {
    expect($this->builder)
        ->toBeInstanceOf(SlackBlockKitBuilder::class);
});

it('can be represented as an array', function (): void {
    $this->builder->blocks([
        $headerBlock = HeaderBlock::make('Test'),
        $contextBlock = ContextBlock::make(),
        $richTextBlock = RichTextBlock::make(),
        $actionsBlock = ActionsBlock::make(),
    ]);

    expect($this->builder->toArray())
        ->toBeArray()
        ->toHaveCount(4)
        ->{0}->toBe($headerBlock->toArray())
        ->{1}->toBe($contextBlock->toArray())
        ->{2}->toBe($richTextBlock->toArray())
        ->{3}->toBe($actionsBlock->toArray());
});

it('can push a single block', function (): void {
    expect($this->builder->blocks([DividerBlock::make()])->pushBlock(HeaderBlock::make('Test')))
        ->getBlocks()->scoped(
            fn (mixed $blocks) => $blocks
                ->toBeArray()
                ->toHaveCount(2)
                ->{0}->toBeInstanceOf(DividerBlock::class)
                ->{1}->toBeInstanceOf(HeaderBlock::class)
        );
});

it('can prepend a single block', function (): void {
    expect($this->builder->blocks([DividerBlock::make()])->prependBlock(HeaderBlock::make('Test')))
        ->getBlocks()->scoped(
            fn (mixed $blocks) => $blocks
                ->toBeArray()
                ->toHaveCount(2)
                ->{0}->toBeInstanceOf(HeaderBlock::class)
                ->{1}->toBeInstanceOf(DividerBlock::class)
        );
});
