--FILE--
<?php
namespace nazarpc;
require_once __DIR__.'/../vendor/autoload.php';

$stream = fopen('php://temp', 'w+b');
fwrite($stream, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua');

var_dump('negative offset', Stream_slicer::slice($stream, -6, 5));
var_dump('negative size', Stream_slicer::slice($stream, 6, -5));

$ipsum_stream = Stream_slicer::slice($stream, 6, 5);

var_dump('negative seek', fseek($ipsum_stream, -2));
?>
--EXPECT--
string(15) "negative offset"
bool(false)
string(13) "negative size"
bool(false)
string(13) "negative seek"
int(-1)
