# PHP-CS-Fixer configurations for Contao

[![](https://img.shields.io/packagist/v/contao/php-cs-fixer.svg?style=flat-square)](https://packagist.org/packages/contao/php-cs-fixer)
[![](https://img.shields.io/packagist/dt/contao/php-cs-fixer.svg?style=flat-square)](https://packagist.org/packages/contao/php-cs-fixer)

This package includes the PHP-CS-Fixer configurations for Contao.

## Installation

You can install the package with Composer:

```
composer require contao/php-cs-fixer
```

## Usage

Add the following to your `.php_cs.dist` file:

```php
<?php

$header = <<<EOF
This file is part of Contao.

(c) Leo Feyer

@license LGPL-3.0-or-later
EOF;

$config = new Contao\PhpCsFixer\DefaultConfig($header);
$config
    ->getFinder()
    ->in(['src/'])
;

return $config;
```

## License

Contao is licensed under the terms of the LGPLv3.

## Getting support

Visit the [support page][2] to learn about the available support options.

[1]: https://contao.org
[2]: https://contao.org/en/support.html
