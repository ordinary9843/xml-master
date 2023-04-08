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

// Set default sub-item name (applies only to numeric array type sub-items).
$xmlMaster->setItemName('item');

/**
 * Array conversion to XML.
 *
 * Output:
 *
 * <root>
 *   <user>
 *     <name>Jerry Chen</name>
 *     <email>ordinary9843@gmail.com</email>
 *     <title>Sortware Engineer</title>
 *     <website>https://github.com/ordinary9843</website>
 *   </user>
 * </root>
 */
$xmlMaster->generate([
    'user' => [
        'name' => 'Jerry Chen',
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
        'name' => 'Jerry Chen',
        'email' => 'ordinary9843@gmail.com',
        'title' => 'Sortware Engineer',
        'website' => 'https://github.com/ordinary9843'
    ]
]);

/**
 * Get error message.
 *
 * Output: 'Any error message.'
 */
$xmlMaster->getError();
```

## Testing

```bash
composer test
```

## Licenses

(The [MIT](http://www.opensource.org/licenses/mit-license.php) License)

Copyright &copy; [Jerry Chen](https://ordinary9843.medium.com/)

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE
