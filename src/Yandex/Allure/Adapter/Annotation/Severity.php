<?php

namespace Yandex\Allure\Adapter\Annotation;

use Yandex\Allure\Adapter\Model\SeverityLevel;

/**
 * @Annotation
 * @Target({"METHOD"})
 */
class Severity
{
    /**
     * @var string
     */
    public $level = SeverityLevel::NORMAL;
}
