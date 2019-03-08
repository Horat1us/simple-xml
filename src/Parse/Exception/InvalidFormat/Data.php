<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Parse\Exception\InvalidFormat;

use Horat1us\SimpleXML\Parse\Exception;

/**
 * Class Data
 * @package Horat1us\SimpleXML\Parse\Exception\InvalidFormat
 */
class Data extends Exception\InvalidFormat
{
    /** @var string */
    protected $contents;

    public function __construct(string $contents, array $errors)
    {
        $length = mb_strlen($contents);
        $source = "string ({$length})";
        parent::__construct($source, $errors);

        $this->contents = $contents;
    }

    public function getContents(): string
    {
        return $this->contents;
    }
}
