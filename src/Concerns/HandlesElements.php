<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Concerns;

use Hosttech\SlackBlockKitBuilder\Elements\AbstractElement;
use Illuminate\Support\Collection;

trait HandlesElements
{
    protected ?Collection $elements = null;

    /** @param array<array-key, mixed> $elements */
    public function elements(array $elements): self
    {
        $this->elements = collect($elements)
            ->reject(fn (mixed $possibleElement): bool => (is_object($possibleElement) && ! in_array($possibleElement::class, $this->allowedItemClasses())) || ! is_object($possibleElement));

        return $this;
    }

    /** @return array{type: string, elements: array<array-key, mixed>|null} */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'elements' => $this->getElementsArrayed() ?? [],
        ];
    }

    public function pushElement(AbstractElement $element): self
    {
        if (! in_array($element::class, $this->allowedItemClasses())) {
            return $this;
        }

        $this->prepareElementsProperty();

        $this->elements->push($element);

        return $this;
    }

    public function prependElement(AbstractElement $element): self
    {
        if (! in_array($element::class, $this->allowedItemClasses())) {
            return $this;
        }

        $this->prepareElementsProperty();

        $this->elements->prepend($element);

        return $this;
    }

    private function prepareElementsProperty(): void
    {
        if (is_null($this->elements)) {
            $this->elements = collect();
        }
    }

    /** @return array<array-key, mixed>|null */
    public function getElementsArrayed(): ?array
    {
        return $this->elements?->reject(fn (mixed $element): bool => ! in_array($element::class, $this->allowedItemClasses()))->transform(fn (mixed $element) => $element->toArray())->values()->all();
    }

    /** @return array<array-key, mixed>|null */
    public function getElements(): ?array
    {
        return $this->elements?->reject(fn (mixed $element): bool => ! in_array($element::class, $this->allowedItemClasses()))->values()->all();
    }
}
