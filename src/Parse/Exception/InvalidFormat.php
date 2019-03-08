<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Parse\Exception;

use Horat1us\SimpleXML\Parse;

/**
 * Class InvalidFormat
 * @package Horat1us\SimpleXML\Parse\Exception
 */
abstract class InvalidFormat extends \InvalidArgumentException implements Parse\Exception
{
    /** @var \LibXMLError[] */
    protected $errors;

    /**
     * InvalidFormat constructor.
     * @param string $source
     * @param \LibXMLError[] $errors
     */
    public function __construct(string $source, array $errors)
    {
        $count = count($errors);
        $message = "{$count} errors found while parsing {$source}.";
        $code = $count;

        parent::__construct($message, $code);

        $this->errors = $errors;
    }

    /**
     * @return \LibXMLError[]
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}
