<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Impl\Serializer;

use Doctrine\Common\Annotations\AnnotationReader;
use Lamoda\IsmpClient\Serializer\SerializerInterface;
use Symfony\Component\PropertyAccess\PropertyAccessor;
use Symfony\Component\PropertyInfo\Extractor\PhpDocExtractor;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Mapping\Factory\ClassMetadataFactory;
use Symfony\Component\Serializer\Mapping\Loader\AnnotationLoader;
use Symfony\Component\Serializer\NameConverter\CamelCaseToSnakeCaseNameConverter;
use Symfony\Component\Serializer\NameConverter\MetadataAwareNameConverter;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final class SymfonySerializerAdapterFactory
{
    public static function create(): SerializerInterface
    {
        $classMetadataFactory = new ClassMetadataFactory(new AnnotationLoader(new AnnotationReader()));
        $normalizer = new ObjectNormalizer(
            $classMetadataFactory,
            new MetadataAwareNameConverter(
                $classMetadataFactory,
                new CamelCaseToSnakeCaseNameConverter()
            ),
            new PropertyAccessor(),
            new PhpDocExtractor()
        );

        $symfonySerializer = new Serializer(
            [
                new FacadeCisListResponseDenormalizer(),
                new FacadeDocBodyResponseBodyDenormalizer(),
                $normalizer,
                new ArrayDenormalizer(),
            ],
            [new JsonEncoder()]
        );

        return new SymfonySerializerAdapter($symfonySerializer);
    }
}
