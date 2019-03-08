<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Tests\Parse\Exception\InvalidFormat;

use Horat1us\SimpleXML\Parse\Exception;
use Horat1us\SimpleXML\Tests;

/**
 * Class File
 * @package Horat1us\SimpleXML\Tests\Parse\Exception\InvalidFormat
 */
class FileTest extends Tests\Parse\Exception\InvalidFormatTest
{
    /** @var string */
    protected $path;

    /** @var Exception\InvalidFormat\File */
    protected $exception;

    protected function setUpException(): void
    {
        $this->path = '/random/path/' . (string)mt_rand(0, 512);
        $this->source = "file {$this->path}";
        $this->exception = new Exception\InvalidFormat\File($this->path, $this->errors);
    }

    public function testGetPath(): void
    {
        $this->assertEquals(
            $this->path,
            $this->exception->getPath()
        );
    }
}
