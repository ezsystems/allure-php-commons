<?php

namespace Yandex\Allure\Adapter\Support;

use Yandex\Allure\Adapter\Allure;
use Yandex\Allure\Adapter\Event\AddAttachmentEvent;

/**
 * Use this trait in order to add Allure attachments support in your tests.
 */
trait AttachmentSupport
{
    /**
     * Adds a new attachment to report.
     *
     * @param string $filePathOrContents either a string with file contents or file path to copy
     * @param $caption
     * @param $type
     */
    public function addAttachment($filePathOrContents, $caption, $type = null)
    {
        Allure::lifecycle()->fire(new AddAttachmentEvent($filePathOrContents, $caption, $type));
    }
}
