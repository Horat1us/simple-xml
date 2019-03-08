<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Parse\Exception\InvalidFormat;

use Horat1us\SimpleXML\Parse\Exception;

/**
 * Class File
 * @package Horat1us\SimpleXML\Parse\Exception\InvalidFormat
 */
class File extends Exception\InvalidFormat
{
    /** @var string */
    protected $path;

    public function __construct(string $path, array $errors)
    {
        $source = "file {$path}";
        parent::__construct($source, $errors);

        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }
}
