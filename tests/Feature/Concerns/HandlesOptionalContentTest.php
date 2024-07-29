<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesOptionalContent;
use Illuminate\Support\Str;

beforeEach(function () {
    $this->classUnderTest = new class
    {
        use HandlesOptionalContent;
    };
});

it('default value of content property is null', function (): void {
    expect($this->classUnderTest->getContent())
        ->toBeNull();
});

it('can set the content to a new string, Stringable or null', function (mixed $contentToSet): void {
    $this->classUnderTest->content($contentToSet);

    expect($this->classUnderTest->getContent())
        ->toEqual($contentToSet);
})
    ->with([
        ['string' => 'Testing'],
        ['stringable' => Str::of('Testing')],
        ['null' => null],
    ]);
