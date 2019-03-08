<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Tests\Parse\Exception;

use PHPUnit\Framework\TestCase;
use Horat1us\SimpleXML\Parse\Exception;

/**
 * Class InvalidFilePathTest
 * @package Horat1us\SimpleXML\Tests\Parse\Exception
 * @internal
 */
class InvalidFilePathTest extends TestCase
{
    /**
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidFilePath::getPath()
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidFilePath::__construct()
     */
    public function testPath(): void
    {
        $path = '/test/path';
        $exception = new Exception\InvalidFilePath($path, Exception\InvalidFilePath::CODE_NOT_FOUND);
        $this->assertEquals(
            $path,
            $exception->getPath()
        );
        $this->assertEquals(
            "File not found: {$path}",
            $exception->getMessage()
        );
    }

    /**
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidFilePath::__construct()
     * @covers \Horat1us\SimpleXML\Parse\Exception\InvalidFilePath::getMessageForCode()
     */
    public function testUnknownCodeMessage(): void
    {
        $exception = new Exception\InvalidFilePath('/file/path.ext', 10);
        $this->assertEquals(
            "Invalid file path (10): /file/path.ext",
            $exception->getMessage()
        );
    }
}
