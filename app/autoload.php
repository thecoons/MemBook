<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/** @var ClassLoader $loader */
$loader = require __DIR__.'/../vendor/autoload.php';
$loader->add('SocketIO\Emitter', __DIR__.'/../vendor/rase/socket.io-emitter/src/');

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
