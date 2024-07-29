<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Elements\ActionElement;

beforeEach(fn () => $this->element = ActionElement::make('Trigger action'));

it('can be created', function (): void {
    expect($this->element)
        ->toBeInstanceOf(ActionElement::class);
});

test('can set and get url which button will open', function (): void {
    $this->element->url('https://google.com');

    expect($this->element->getUrl())
        ->toBe('https://google.com');
});

test('cannot have elements', function (): void {
    expect(ActionElement::class)
        ->not->toUse([HandlesElements::class]);
});

test('can be represented as an array', function (): void {
    expect($this->element->toArray())
        ->toBeArray()
        ->type->toBe('button')
        ->text->scoped(
            fn (mixed $array) => $array
                ->type->toBe('plain_text')
                ->text->toBe('Trigger action')
        );

    $this->element->url('https://google.com');

    expect($this->element->toArray())
        ->url->toBeUrl()->toBe('https://google.com');
});
