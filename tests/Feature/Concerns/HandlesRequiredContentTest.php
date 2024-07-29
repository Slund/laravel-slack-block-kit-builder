<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesRequiredContent;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->classUnderTest = new class
    {
        use HandlesRequiredContent;
    };
});

it('default value of content property is an empty string', function (): void {
    expect($this->classUnderTest->getContent())
        ->toBeString()->toBeEmpty();
});

it('can set the content to a new string or Stringable', function (mixed $contentToSet): void {
    $this->classUnderTest->content($contentToSet);

    expect($this->classUnderTest->getContent())
        ->toEqual($contentToSet);
})
    ->with([
        ['string' => 'Testing'],
        ['stringable' => Str::of('Testing')],
    ]);
