<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Tests\Parse\Exception;

use PHPUnit\Framework\TestCase;
use Horat1us\SimpleXML\Parse\Exception;

/**
 * Class InvalidFormatTest
 * @package Horat1us\SimpleXML\Tests\Parse\Exception
 */
class InvalidFormatTest extends TestCase
{
    /** @var string */
    protected $source;

    /** @var Exception\InvalidFormat */
    protected $exception;

    /** @var \LibXMLError[] */
    protected $errors;

    final protected function setUp(): void
    {
        parent::setUp();
        $this->errors = [new \LibXMLError, new \LibXMLError,];
        $this->setUpException();
    }

    protected function setUpException(): void
    {
        $this->source = 'abstract-format';
        /** @var Exception\InvalidFormat $mock */
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->exception = $this->getMockBuilder(Exception\InvalidFormat::class)
            ->setConstructorArgs([$this->source, $this->errors])
            ->getMockForAbstractClass();
    }

    /**
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidFormat::getErrors()
     */
    public function testGetErrors(): void
    {
        $this->assertEquals(
            $this->errors,
            $this->exception->getErrors()
        );
    }

    public function testMessage(): void
    {
        $this->assertEquals(
            "2 errors found while parsing {$this->source}.",
            $this->exception->getMessage()
        );
    }

    public function testCode()
    {
        $this->assertEquals(
            2,
            $this->exception->getCode()
        );
    }
}
