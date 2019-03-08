<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Tests\Parse\Exception;

use PHPUnit\Framework\TestCase;
use Horat1us\SimpleXML\Parse\Exception;

/**
 * Class InvalidClassNameTest
 * @package Horat1us\SimpleXML\Tests\Parse\Exception
 */
class InvalidClassNameTest extends TestCase
{
    /** @var string */
    protected $className;

    /** @var Exception\InvalidClassName */
    protected $exception;

    protected function setUp(): void
    {
        parent::setUp();
        /** @noinspection PhpUnhandledExceptionInspection */
        $this->className = random_bytes(32);
        $this->exception = new Exception\InvalidClassName($this->className);
    }

    /**
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidClassName::__construct()
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidClassName::getClassName()
     */
    public function testGetClassName(): void
    {
        $this->assertEquals(
            $this->className,
            $this->exception->getClassName()
        );
    }

    /**
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidClassName::__construct()
     */
    public function testMessage(): void
    {
        $this->assertEquals(
            "Class {$this->className} not found.",
            $this->exception->getMessage()
        );
    }
}
