<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Tests\Parse\Exception\InvalidFormat;

use Horat1us\SimpleXML\Parse\Exception;
use Horat1us\SimpleXML\Tests;

/**
 * Class DataTest
 * @package Horat1us\SimpleXML\Tests\Parse\Exception\InvalidFormat
 */
class DataTest extends Tests\Parse\Exception\InvalidFormatTest
{
    /** @var string */
    protected $contents;

    /** @var Exception\InvalidFormat\Data */
    protected $exception;

    protected function setUpException(): void
    {
        $this->contents = (string)mt_rand(0, 9);
        $this->source = "string (1)";
        $this->exception = new Exception\InvalidFormat\Data($this->contents, $this->errors);
    }

    public function testGetContents(): void
    {
        $this->assertEquals(
            $this->contents,
            $this->exception->getContents()
        );
    }
}
