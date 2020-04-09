<?php

namespace Yandex\Allure\Adapter\Model;

/**
 * Step status.
 */
final class Status
{
    const FAILED = 'failed';
    const BROKEN = 'broken';
    const PASSED = 'passed';
    const CANCELED = 'canceled';
    const PENDING = 'pending';
}
