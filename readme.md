# Pathtastic

Pathtastic PHP provides a way to verify that a specified target directory or file is contained within a subpath of a specified required parent directory.

## Requirements
I haven't test it but you should only need PHP 4.0.0 or above to run pathtastic.  If you want to run the PHPUnit tests then it [requires PHP 7.1 or newer](https://phpunit.de/announcements/phpunit-7.html).

## Installation

You can install Pathtastic with composer using the following command

```
composer require bitquick/pathtastic
```

## Usage

Check whether a **target** file or directory is within a subpath of a **required** directory.
```
use Bitquick\Pathtastic\Pathtastic;

if ( Pathtastic::verifyPath($targetPath, $requiredPath) ) {
    // target path is within required path
} else {
    // target path exists outside of required path.
}
```

## License
Pathtastic is released under the MIT license.