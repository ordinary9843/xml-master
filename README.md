# Xml Master

[![build](https://github.com/ordinary9843/xml-master/actions/workflows/build.yml/badge.svg)](https://github.com/ordinary9843/meta-master/actions/workflows/build.yml)
[![codecov](https://codecov.io/gh/ordinary9843/xml-master/branch/master/graph/badge.svg?token=QKCE7LJISZ)](https://codecov.io/gh/ordinary9843/xml-master)

### Intro

Convert array to XML format.

## Requirements

This library has the following requirements:

- PHP 7.1+

## Installation

Require the package via composer:

```bash
composer require ordinary9843/xml-master
```

## Usage

Example usage:

```php
<?php
require './vendor/autoload.php';

use Ordinary9843\XmlMaster;

$xmlMaster = new XmlMaster();

// Set XML version.
$xmlMaster->setVersion('1.0');

// Set XML encoding type.
$xmlMaster->setEncoding('UTF-8');

/**
 * Array conversion to XML.
 *
 * Output:
 *
 * <root>
 *   <user>
 *     <name>Software Engineer</name>
 *     <email>ordinary9843@gmail.com</email>
 *     <title>Sortware Engineer</title>
 *     <website>https://github.com/ordinary9843</website>
 *   </user>
 * </root>
 */
$xmlMaster->convert([
    'user' => [
        'name' => 'Software Engineer',
        'email' => 'ordinary9843@gmail.com',
        'title' => 'Sortware Engineer',
        'website' => 'https://github.com/ordinary9843'
    ]
]);

/**
 * Convert array to XML and save the result.
 */
$xmlMaster->save('./test.xml', [
    'user' => [
        'name' => 'Software Engineer',
        'email' => 'ordinary9843@gmail.com',
        'title' => 'Sortware Engineer',
        'website' => 'https://github.com/ordinary9843'
    ]
]);

/**
 * Get all messages.
 *
 * Output: [
 *  '[INFO] Message.',
 *  '[ERROR] Message.'
 * ]
 */
$xmlMaster->getMessages();
```

## Testing

```bash
composer test
```

## Licenses

(The [MIT](http://www.opensource.org/licenses/mit-license.php) License)
