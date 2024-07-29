<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Elements\ActionElement;
use Hosttech\SlackBlockKitBuilder\Elements\ContextElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemLinkElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemTextElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextListElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextSectionElement;

beforeEach(fn () => $this->element = RichTextListElement::make());

it('can be created', function (): void {
    expect($this->element)
        ->toBeInstanceOf(RichTextListElement::class);
});

test('can set and get indentation', function (): void {
    $this->element->indent(1);

    expect($this->element->getIndent())
        ->toBe(1);
});

test('can set and get offset', function (): void {
    $this->element->offset(1);

    expect($this->element->getOffset())
        ->toBe(1);
});

test('can set and get border', function (): void {
    $this->element->border(1);

    expect($this->element->getBorder())
        ->toBe(1);
});

test('can be represented as an array', function (): void {
    expect($this->element->toArray())
        ->toBeArray()
        ->type->toBe('rich_text_list')
        ->elements->toBeArray()->toBeEmpty()
        ->style->toBe('bullet')
        ->indent->toBe(0)
        ->border->toBe(0)
        ->offset->toBe(0);
});

it('does only allow certain elements', function (): void {
    $this->element->elements([
        RichTextItemLinkElement::make('Test'),
        RichTextItemTextElement::make('Test'),
        ActionElement::make('Test'),
        ContextElement::make('Test'),
        RichTextListElement::make(),
        RichTextSectionElement::make(),
    ]);

    expect($this->element)
        ->getElements()
        ->scoped(
            fn (mixed $elements) => $elements
                ->toHaveCount(1)
                ->{0}->toBeInstanceOf(RichTextSectionElement::class)
        );
});
