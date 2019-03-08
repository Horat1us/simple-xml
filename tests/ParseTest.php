<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML\Tests;

use PHPUnit\Framework\TestCase;
use Horat1us\SimpleXML;

/**
 * Class ParseTest
 * @package Horat1us\SimpleXML\Tests
 */
class ParseTest extends TestCase
{
    public function testInvalidClassName(): void
    {
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<data id="1"/>
XML;

        $this->expectException(SimpleXML\Parse\Exception\InvalidClassName::class);
        $this->expectExceptionMessage('Class invalidClassName+ not found.');

        SimpleXML\Parse::string($xml, 'invalidClassName+');
    }

    public function testInvalidContents(): void
    {
        $invalidXml = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<data id="1"\/>
XML;

        $this->expectException(SimpleXML\Parse\Exception\InvalidFormat\Data::class);
        $this->expectExceptionMessage('3 errors found while parsing string (55).');

        SimpleXML\Parse::string($invalidXml);
    }

    public function testInstantiateClass(): void
    {
        $validXml = <<<XML
<?xml version="1.0" encoding="UTF-8" ?>
<data id="1"/>
XML;
        $object = $this->mockElement($validXml);

        $element = SimpleXML\Parse::string($validXml, get_class($object));

        $this->assertEquals($object, $element);
    }

    public function testInvalidXmlFile(): void
    {
        $invalidXmlPath = __DIR__ . '/data/invalid.xml';

        $this->expectException(SimpleXML\Parse\Exception\InvalidFormat\File::class);
        $this->expectExceptionMessageRegExp(
            '/^7 errors found while parsing file .+\/tests\/data\/invalid\.xml\./'
        );

        SimpleXML\Parse::file($invalidXmlPath);
    }

    public function testInvalidPath(): void
    {
        $invalidPath = __FILE__ . '.not-found';


        $this->expectException(SimpleXML\Parse\Exception\InvalidFilePath::class);
        $this->expectExceptionMessageRegExp(
            '/^File not found\: .+\/tests\/ParseTest\.php\.not-found$/'
        );
        SimpleXML\Parse::file($invalidPath);
    }

    public function testValidXmlFile(): void
    {
        $validXmlPath = __DIR__ . '/data/valid.xml';
        $object = $this->mockElement(file_get_contents($validXmlPath));

        $element = SimpleXML\Parse::file($validXmlPath, get_class($object));

        $this->assertEquals($object, $element);
    }

    protected function mockElement(string $xml): \SimpleXMLElement
    {
        return new class($xml) extends \SimpleXMLElement
        {
        };
    }
}
