<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesStylableRichText;

beforeEach(function () {
    $this->classUnderTest = new class
    {
        use HandlesStylableRichText;

        public function toArray(): array
        {
            $array = [
                'type' => 'testing',
            ];

            $this->handleStyleArrayKey($array);

            return $array;
        }
    };
});

test('bold property can be toggled', function (): void {
    $this->classUnderTest->bold();

    expect($this->classUnderTest->getBold())
        ->toBeTrue();

    $this->classUnderTest->bold(false);

    expect($this->classUnderTest->getBold())
        ->toBeFalse();
});

test('italic property can be toggled', function (): void {
    $this->classUnderTest->italic();

    expect($this->classUnderTest->getItalic())
        ->toBeTrue();

    $this->classUnderTest->italic(false);

    expect($this->classUnderTest->getItalic())
        ->toBeFalse();
});

test('in case certain private method is called in toArray, bold and italic properties will be properly set in the style key of the array', function (): void {
    expect($this->classUnderTest->toArray())
        ->not->toHaveKey('bold')
        ->not->toHaveKey('italic');

    $this->classUnderTest->bold();
    $this->classUnderTest->italic();

    expect($this->classUnderTest->toArray())
        ->style->scoped(
            fn (mixed $style) => $style
                ->bold->toBeTrue()
                ->italic->toBeTrue()
        );
});
