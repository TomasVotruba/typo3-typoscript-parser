<?php declare(strict_types=1);

namespace Helmich\TypoScriptParser\Tokenizer;

/**
 * Helper class for scanning lines
 *
 * @package    Helmich\TypoScriptParser
 * @subpackage Tokenizer
 */
class Scanner implements \Iterator
{
    /** @var array */
    private $lines = [];
    private $index = 0;

    public function __construct(array $lines)
    {
        $this->lines = $lines;
    }

    public function current(): ScannerLine
    {
        return new ScannerLine($this->index + 1, $this->lines[$this->index]);
    }

    public function next(): void
    {
        $this->index++;
    }

    public function key(): int
    {
        return $this->index;
    }

    public function valid(): bool
    {
        return $this->index < count($this->lines);
    }

    public function rewind(): void
    {
        $this->index = 0;
    }
}
