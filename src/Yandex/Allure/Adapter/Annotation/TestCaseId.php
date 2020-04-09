<?php

namespace Yandex\Allure\Adapter\Annotation;

use Doctrine\Common\Annotations\Annotation\Required;

/**
 * @Annotation
 * @Target({"CLASS", "METHOD"})
 */
class TestCaseId
{
    /**
     * @var array
     * @Required
     */
    public $testCaseIds;

    /**
     * @return array
     */
    public function getTestCaseIds()
    {
        return $this->testCaseIds;
    }
}
