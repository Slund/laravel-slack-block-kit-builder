<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Elements\ContextElement;

beforeEach(fn () => $this->element = ContextElement::make('Context element content'));

it('can be created', function (): void {
    expect($this->element)
        ->toBeInstanceOf(ContextElement::class);
});

test('can set and get type of text', function (): void {
    $this->element->type(ContextElement::TypeText);

    expect($this->element->getType())
        ->toBe(ContextElement::TypeText);
});

test('cannot set type of text to something else than "text" or "mrkdwn"', function (): void {
    $this->element->type('testing');

    expect($this->element->getType())
        ->toBe(ContextElement::TypeMarkdown);
});

test('cannot have elements', function (): void {
    expect(ContextElement::class)
        ->not->toUse([HandlesElements::class]);
});

test('can be represented as an array', function (): void {
    expect($this->element->toArray())
        ->toBeArray()
        ->type->toBe(ContextElement::TypeMarkdown)
        ->text->toBe('Context element content');

    $this->element->type(ContextElement::TypeText);

    expect($this->element->toArray())
        ->type->toBe(ContextElement::TypeText);
});
