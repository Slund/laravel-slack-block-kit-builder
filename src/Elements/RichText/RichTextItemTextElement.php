<?php

declare(strict_types=1);

namespace Hosttech\SlackBlockKitBuilder\Elements\RichText;

use Exception;
use Hosttech\SlackBlockKitBuilder\Concerns\HandlesRequiredContent;
use Hosttech\SlackBlockKitBuilder\Concerns\HandlesStylableRichText;
use Hosttech\SlackBlockKitBuilder\Elements\AbstractElement;
use Illuminate\Support\Stringable;

class RichTextItemTextElement extends AbstractElement
{
    use HandlesRequiredContent;
    use HandlesStylableRichText;

    protected string $type = 'text';

    public function __construct(
        string|Stringable $content,
    ) {
        $this->content = $content;
    }

    /**
     * @throws Exception
     */
    public function type(string $textBlockType): self
    {
        throw new Exception('Type cannot be set for '.self::class);
    }

    public static function make(string|Stringable $content): RichTextItemTextElement
    {
        return new self($content);
    }

    public function toArray(): array
    {
        $array = [
            'type' => $this->type,
            'text' => $this->content,
        ];

        $this->handleStyleArrayKey($array);

        return $array;
    }
}
