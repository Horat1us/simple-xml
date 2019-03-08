<?php

declare(strict_types=1);

namespace Horat1us\SimpleXML;

/**
 * Class Parser
 * @package Horat1us\SimpleXML
 */
class Parse
{
    /**
     * @throws Parse\Exception\InvalidFormat\Data
     * @throws Parse\Exception\InvalidClassName
     */
    public static function string(string $contents, string $className = null): \SimpleXMLElement
    {
        static::validateClass($className);

        libxml_use_internal_errors(true);

        $response = simplexml_load_string($contents, $className);
        if ($response === false) {
            throw new Parse\Exception\InvalidFormat\Data($contents, libxml_get_errors());
        }

        return $response;
    }

    /**
     * @throws Parse\Exception\InvalidFilePath
     * @throws Parse\Exception\InvalidFormat\Data
     * @throws Parse\Exception\InvalidClassName
     */
    public static function file(string $path, string $className = null): \SimpleXMLElement
    {
        static::validateClass($className);
        static::validateFilePath($path);

        libxml_use_internal_errors(true);

        $response = simplexml_load_file($path, $className);
        if ($response === false) {
            throw new Parse\Exception\InvalidFormat\File($path, libxml_get_errors());
        }

        return $response;
    }

    protected static function validateClass(string $name = null): void
    {
        if (is_null($name) || class_exists($name)) {
            return;
        }

        throw new Parse\Exception\InvalidClassName($name);
    }

    protected static function validateFilePath(string $path)
    {
        if (!is_file($path)) {
            throw new Parse\Exception\InvalidFilePath(
                $path,
                Parse\Exception\InvalidFilePath::CODE_NOT_FOUND
            );
        }

        return false;
    }
}
