<?php

require "vendor/autoload.php";

use Bitquick\Pathtastic\Pathtastic;

$path = "https://github.com/bitquick/pathtastic";
$enc_path =  Pathtastic::url2path($path);
$dec_path = Pathtastic::path2url($enc_path);

echo "Original Path: " . $path;
echo "<br />\n";
echo "Encoded Path: " . $enc_path;
echo "<br />\n";
echo "Decoded Path: " . $dec_path;
echo "<br />\n";
