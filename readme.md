[![Build Status](https://img.shields.io/travis/nazar-pc/stream-slicer/master.svg?label=Travis CI)](https://travis-ci.org/nazar-pc/stream-slicer)
## Stream slicer - Get slice of any seekable stream

When working with PHP streams you sometimes need to have a slice of some stream.

For instance, you're parsing a huge multipart message with multiple uploaded files.
Obviously, you don't want to store gibibytes of data all in memory. so you're using stream and parse it piece by piece.
But when you encounter the beginning of large file within that stream you'll also want to avoid storing it into memory or copy to some place in addition to original data.
Unfortunately, PHP itself doesn't have primitive to create slice of that stream, but thanks to Stream slicer you can do it very easily.

## Requirements:

* PHP 5.6+ or HHVM

## How to use?

Simply add dependency on `nazar-pc/stream-slicer` to your project's `composer.json`:

```json
{
    "require": {
        "nazar-pc/stream-slicer": "1.*"
    }
}
```

```php
<?php
$stream = fopen('very-huge-multipart.bin', 'rb');
$file = \nazarpc\Stream_slicer::slice(
	$stream,
	1024 * 1024 * 50,
	1024 * 1024 * 1024
);
```

## Contribution
Feel free to create issues and send pull requests, they are highly appreciated!

## License
MIT License, see license.txt
