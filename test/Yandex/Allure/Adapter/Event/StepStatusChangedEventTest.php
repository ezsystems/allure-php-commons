<?php

namespace Yandex\Allure\Adapter\Event;

use Yandex\Allure\Adapter\Model\Step;
use PHPUnit\Framework\TestCase;

abstract class StepStatusChangedEventTest extends TestCase
{
    /**
     * @return string
     */
    abstract protected function getTestedStatus();

    /**
     * @return StepEvent
     */
    abstract protected function getStepEvent();

    public function testEvent()
    {
        $step = new Step();
        $event = $this->getStepEvent();
        $event->process($step);
        $this->assertEquals($this->getTestedStatus(), $step->getStatus());
    }
}
