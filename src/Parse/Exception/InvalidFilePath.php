<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Parse\Exception;

use Horat1us\SimpleXML\Parse;

/**
 * Class FileNotFound
 * @package Horat1us\SimpleXML\Parse\Exception
 */
class InvalidFilePath extends \InvalidArgumentException implements Parse\Exception
{
    public const CODE_NOT_FOUND = 201;

    /** @var string */
    protected $path;

    public function __construct(string $path, int $code = 0, \Throwable $previous = null)
    {
        $message = $this->getMessageForCode($code) . ": {$path}";
        parent::__construct($message, $code, $previous);

        $this->path = $path;
    }

    public function getPath(): string
    {
        return $this->path;
    }

    private function getMessageForCode(int $code): string
    {
        switch ($code) {
            case static::CODE_NOT_FOUND:
                return "File not found";
            default:
                return "Invalid file path ({$code})";
        }
    }
}
