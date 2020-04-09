<?php

namespace Yandex\Allure\Adapter\Event;

use Yandex\Allure\Adapter\Model\TestCase;
use PHPUnit\Framework\TestCase as PHPUnitTestCase;

class TestCaseFinishedEventTest extends PHPUnitTestCase
{
    public function testEvent()
    {
        $testCase = new TestCase();
        $event = new TestCaseFinishedEvent();
        $event->process($testCase);
        $this->assertNotEmpty($testCase->getStop());
    }
}
