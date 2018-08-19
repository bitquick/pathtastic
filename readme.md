# Pathtastic

Pathtastic PHP provides a way to verify that a specified target directory or file is contained within a subpath of a specified required parent directory.

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