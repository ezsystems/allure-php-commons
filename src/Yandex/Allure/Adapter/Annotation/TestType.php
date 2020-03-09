<?php

namespace Yandex\Allure\Adapter\Annotation;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class TestType
{
    /**
     * @var string
     */
    public $type = 'screenshotDiff';
}
