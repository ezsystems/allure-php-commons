<?php
use Doctrine\Common\Annotations\AnnotationRegistry; 

require_once __DIR__ . '/vendor/autoload.php';

AnnotationRegistry::registerloader([require __DIR__ . '/vendor/autoload.php', 'loadClass']);
date_default_timezone_set('UTC');