<?php

/**
 * Modifications copyright (C) 2013 eZ Systems AS.
 */
namespace Yandex\Allure\Adapter\Annotation;

use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\IndexedReader;

class AnnotationProvider
{
    /**
     * @var AnnotationReader
     */
    private static $annotationReader;

    /**
     * @var IndexedReader
     */
    private static $indexedReader;

    /**
     * Returns a list of class annotations.
     *
     * @param $instance
     *
     * @return array
     */
    public static function getClassAnnotations($instance)
    {
        $ref = new \ReflectionClass($instance);

        return self::getIndexedReader()->getClassAnnotations($ref);
    }

    /**
     * Returns a list of method annotations.
     *
     * @param $instance
     * @param $methodName
     *
     * @return array
     */
    public static function getMethodAnnotations($instance, $methodName)
    {
        $ref = new \ReflectionMethod($instance, $methodName);

        return self::getIndexedReader()->getMethodAnnotations($ref);
    }

    /**
     * @return IndexedReader
     */
    private static function getIndexedReader()
    {
        if (!isset(self::$indexedReader)) {
            self::registerAnnotationNamespaces();
            self::$indexedReader = new IndexedReader(self::getAnnotationReader());
        }

        return self::$indexedReader;
    }

    /**
     * @return AnnotationReader
     */
    private static function getAnnotationReader()
    {
        if (!isset(self::$annotationReader)) {
            self::registerAnnotationNamespaces();
            self::$annotationReader = new AnnotationReader();
        }

        return self::$annotationReader;
    }

    public static function registerAnnotationNamespaces()
    {
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/Exclude.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/ExclusionPolicy.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/SerializedName.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/Type.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/XmlAttribute.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/XmlElement.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/XmlList.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/XmlNamespace.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/XmlValue.php");
        AnnotationRegistry::registerFile(__DIR__ . "/../../../../../../../../vendor/jms/serializer/src/Annotation/XmlRoot.php");

        AnnotationRegistry::registerAutoloadNamespace(
            'JMS\Serializer\Annotation',
            [
                __DIR__ . '/../../../../../../../../vendor/jms/serializer/src',
                __DIR__ . '/../../../../vendor/jms/serializer/src',
            ]
        );

        AnnotationRegistry::registerAutoloadNamespace(
            'Yandex\Allure\Adapter\Annotation',
            __DIR__ . '/../../../../../src'
        );
    }

    /**
     * Allows to ignore framework-specific annotations.
     *
     * @param array $annotations
     */
    public static function addIgnoredAnnotations(array $annotations)
    {
        foreach ($annotations as $annotation) {
            self::getAnnotationReader()->addGlobalIgnoredName($annotation);
        }
    }

    /**
     * Remove the singleton instances. Useful in unit-testing.
     */
    public static function tearDown()
    {
        static::$indexedReader = null;
        static::$annotationReader = null;
    }
}
