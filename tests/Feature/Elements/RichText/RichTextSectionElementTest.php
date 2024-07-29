<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Elements\ActionElement;
use Hosttech\SlackBlockKitBuilder\Elements\ContextElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemLinkElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemTextElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextListElement;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextSectionElement;

beforeEach(fn () => $this->element = RichTextSectionElement::make());

it('can be created', function (): void {
    expect($this->element)
        ->toBeInstanceOf(RichTextSectionElement::class);
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
                ->toHaveCount(2)
                ->{0}->toBeInstanceOf(RichTextItemLinkElement::class)
                ->{1}->toBeInstanceOf(RichTextItemTextElement::class)
        );
});
