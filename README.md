# Simple Xml Extension
[![Build Status](https://travis-ci.org/Horat1us/simple-xml.svg?branch=master)](https://travis-ci.org/Horat1us/simple-xml)
[![codecov](https://codecov.io/gh/Horat1us/simple-xml/branch/master/graph/badge.svg)](https://codecov.io/gh/Horat1us/simple-xml)

This package provides some extensions fore simple xml:
- [Parse](#parse)

## Installation
```bash
composer require wearesho-team/simple-xml
```

## Usage

### Parse
This class represents parser, that wraps `simplexml_load_string` and `simplexml_load_file`
into errors wrapper, so you will be able to catch exceptions.

#### File Parsing
```php
<?php

use Horat1us\SimpleXML;

$path = 'valid.xml';

try {
    $element = SimpleXML\Parse::file($path/*, $className*/);    
} catch(SimpleXML\Parse\Exception\InvalidFilePath $e) {
    $path = $e->getPath();
} catch(SimpleXML\Parse\Exception\InvalidFormat\File $e) {
    $filePath = $e->getPath();
    $libXmlErrors = $e->getErrors();
} catch(SimpleXML\Parse\Exception\InvalidClassName $e) {
    $className = $e->getClassName();
}
```

#### String Parsing
```php
<?php

use Horat1us\SimpleXML;

$path = 'valid.xml';

try {
    $element = SimpleXML\Parse::file($path/*, $className*/);    
} catch(SimpleXML\Parse\Exception\InvalidFormat\Data $e) {
    $contents = $e->getContents();
    $libXmlErrors = $e->getErrors();
} catch(SimpleXML\Parse\Exception\InvalidClassName $e) {
    $className = $e->getClassName();
}
```

#### Errors

- [Parse\Exception](./src/Parse/Exception.php) - base exception interface for all parsing exceptions.
    - [Parse\Exception\InvalidFormat](./src/Parse/Exception/InvalidFormat.php) - base exception for
    libxml errors
        - [Parse\Exception\InvalidFormat\Data](./src/Parse/Exception/InvalidFormat/Data.php) - string parse errors
        - [Parse\Exception\InvalidFormat\File](./src/Parse/Exception/InvalidFormat/File.php) - file parse errors
    - [Parse\Exception\InvalidClassName](./src/Parse/Exception/InvalidClassName.php) - represents case when
    passed class name does not exist.
    - [Parse\Exception\InvaldiFilePath](./src/Parse/Exception/InvalidFilePath.php) - represents case when
    passed file path does not exists or is not file path.


## Contributors
- [Alexander <horat1us> Letnikow](mailto:reclamme@gmail.com)

## License
[MIT](./LICENSE)
