<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemLinkElement;

beforeEach(fn () => $this->element = RichTextItemLinkElement::make('https://google.com'));

it('can be created', function (): void {
    expect($this->element)
        ->toBeInstanceOf(RichTextItemLinkElement::class)
        ->getUrl()->toBe('https://google.com');
});

test('can set and get unsafe property', function (): void {
    $this->element->unsafe(true);

    expect($this->element->getUnsafe())
        ->toBeTrue();
});

test('cannot have elements', function (): void {
    expect(RichTextItemLinkElement::class)
        ->not->toUse([HandlesElements::class]);
});

test('can be represented as an array', function (): void {
    $this->element->content('Test');
    $this->element->unsafe(true);

    expect($this->element->toArray())
        ->toBeArray()
        ->type->toBe('link')
        ->text->toBe('Test')
        ->url->toBeUrl()->toBe('https://google.com')
        ->unsafe->toBeTrue();
});
