<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Blocks\RichTextBlock;
use Hosttech\SlackBlockKitBuilder\Elements\ActionElement;
use Hosttech\SlackBlockKitBuilder\Elements\ContextElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemLinkElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemTextElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextListElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextSectionElement;

beforeEach(fn () => $this->block = RichTextBlock::make());

it('can be created', function (): void {
    expect($this->block)
        ->toBeInstanceOf(RichTextBlock::class);
});

test('can be represented as an array', function (): void {
    expect($this->block->toArray())
        ->toBeArray()
        ->type->toBe('rich_text')
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
        RichTextSectionElement::make(),
        RichTextListElement::make(),
        RichTextItemLinkElement::make('Test'),
        RichTextItemTextElement::make('Test'),
    ]);

    expect($this->block)
        ->getElements()
        ->scoped(
            fn (mixed $elements) => $elements
                ->toHaveCount(2)
                ->{0}->toBeInstanceOf(RichTextSectionElement::class)
                ->{1}->toBeInstanceOf(RichTextListElement::class)
        );
});
