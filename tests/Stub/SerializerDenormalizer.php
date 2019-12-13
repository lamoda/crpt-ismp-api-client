<?php

declare(strict_types=1);


namespace Lamoda\IsmpClient\Tests\Stub;


use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

/**
 * Stub for test
 */
class SerializerDenormalizer implements DenormalizerInterface, SerializerInterface
{
    /**
     * @inheritDoc
     */
    public function denormalize($data, $type, $format = null, array $context = [])
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function supportsDenormalization($data, $type, $format = null)
    {
        return false;
    }

    public function serialize($data, $format, array $context = [])
    {
        return '';
    }

    public function deserialize($data, $type, $format, array $context = [])
    {
        return [];
    }
}
