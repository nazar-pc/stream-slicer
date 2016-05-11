--FILE--
<?php
namespace nazarpc;
require_once __DIR__.'/../vendor/autoload.php';

$stream = fopen('php://temp', 'w+b');
fwrite($stream, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua');

$ipsum_stream = Stream_slicer::slice($stream, 6, 5);

var_dump('ip', fread($ipsum_stream, 2));
var_dump('ftell()', ftell($ipsum_stream));
var_dump('su', fread($ipsum_stream, 2));
var_dump('feof() #1', feof($ipsum_stream));
var_dump('remainder m', fread($ipsum_stream, 100));
var_dump('feof() #2', feof($ipsum_stream));
var_dump('ipsum', stream_get_contents($ipsum_stream, -1, 0));
?>
--EXPECT--
string(2) "ip"
string(2) "ip"
string(7) "ftell()"
int(2)
string(2) "su"
string(2) "su"
string(9) "feof() #1"
bool(false)
string(11) "remainder m"
string(1) "m"
string(9) "feof() #2"
bool(true)
string(5) "ipsum"
string(5) "ipsum"
