<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Elements\RichText\RichTextItemTextElement;

beforeEach(fn () => $this->element = RichTextItemTextElement::make('Test'));

it('can be created', function (): void {
    expect($this->element)
        ->toBeInstanceOf(RichTextItemTextElement::class)
        ->getContent()->toBe('Test');
});

test('cannot set type, exception will be thrown', function (): void {
    $this->element->type('mrkdwn');
})->expectExceptionMessage('Type cannot be set for Hosttech\\SlackBlockKitBuilder\\Elements\\RichText\\RichTextItemTextElement');

test('cannot have elements', function (): void {
    expect(RichTextItemTextElement::class)
        ->not->toUse([HandlesElements::class]);
});

test('can be represented as an array', function (): void {
    expect($this->element->toArray())
        ->toBeArray()
        ->type->toBe('text')
        ->text->toBe('Test');
});
