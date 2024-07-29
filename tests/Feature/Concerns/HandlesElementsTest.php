<?php

declare(strict_types=1);

use Hosttech\SlackBlockKitBuilder\Concerns\HandlesElements;
use Hosttech\SlackBlockKitBuilder\Elements\AbstractElement;

beforeEach(function () {
    $GLOBALS['dummyElementClass'] = new class extends AbstractElement
    {
        public function toArray(): array
        {
            return [
                'type' => 'testing',
            ];
        }
    };

    $GLOBALS['anotherDummyElementClass'] = new class extends AbstractElement
    {
        public function toArray(): array
        {
            return [
                'type' => 'testing2',
            ];
        }
    };

    $this->classUnderTest = new class
    {
        use HandlesElements;

        protected string $type = 'testing_type';

        public function allowedItemClasses(): array
        {
            return [
                $GLOBALS['dummyElementClass']::class,
            ];
        }
    };
});

it('can set all elements at once', function (): void {
    $this->classUnderTest->elements([
        new $GLOBALS['dummyElementClass'],
        new $GLOBALS['anotherDummyElementClass'],
    ]);

    expect($this->classUnderTest->getElements())
        ->toHaveCount(1)
        ->{0}->toBeInstanceOf($GLOBALS['dummyElementClass']::class);
});

it('can by default be represented as an array', function (): void {
    $this->classUnderTest->elements([
        new $GLOBALS['dummyElementClass'],
        new $GLOBALS['anotherDummyElementClass'],
    ]);

    expect($this->classUnderTest->toArray())
        ->type->toBe('testing_type')
        ->elements->scoped(fn (mixed $elements) => $elements
        ->toHaveCount(1)
        ->{0}->type->toBe('testing')
        );
});

it('can push elements to the end of the stack', function (): void {
    $this->classUnderTest->pushElement(new $GLOBALS['dummyElementClass']);

    expect($this->classUnderTest->getElements())
        ->toHaveCount(1)
        ->{0}->toBeInstanceOf($GLOBALS['dummyElementClass']::class);
});

it('can prepend elements to the beginning of the stack', function (): void {
    $this->classUnderTest->prependElement(new $GLOBALS['dummyElementClass']);

    expect($this->classUnderTest->getElements())
        ->toHaveCount(1)
        ->{0}->toBeInstanceOf($GLOBALS['dummyElementClass']::class);
});

it('cannot push not allowed elements to the end of the stack', function (): void {
    $this->classUnderTest->pushElement(new $GLOBALS['anotherDummyElementClass']);

    expect($this->classUnderTest->getElements())
        ->toBeEmpty();
});

it('cannot prepend not allowed elements to the beginning of the stack', function (): void {
    $this->classUnderTest->prependElement(new $GLOBALS['anotherDummyElementClass']);

    expect($this->classUnderTest->getElements())
        ->toBeEmpty();
});
