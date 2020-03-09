<?php

namespace Yandex\Allure\Adapter\Event;

use Yandex\Allure\Adapter\Model\Step;
use PHPUnit\Framework\TestCase;

class StepFinishedEventTest extends TestCase
{
    public function testEvent()
    {
        $step = new Step();
        $event = new StepFinishedEvent();
        $event->process($step);
        $this->assertNotEmpty($step->getStop());
    }
}
