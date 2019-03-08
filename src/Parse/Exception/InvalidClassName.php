<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Parse\Exception;

use Horat1us\SimpleXML\Parse;

/**
 * Class InvalidClassName
 * @package Horat1us\SimpleXML\Parse\Exception
 */
class InvalidClassName extends \InvalidArgumentException implements Parse\Exception
{
    /** @var string */
    protected $className;

    public function __construct(string $className)
    {
        $message = "Class {$className} not found.";
        parent::__construct($message);

        $this->className = $className;
    }

    public function getClassName(): string
    {
        return $this->className;
    }
}
