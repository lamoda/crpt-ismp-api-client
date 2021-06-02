<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Impl\Serializer\V4;

use Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse\Body;
use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;
use Symfony\Component\Serializer\SerializerInterface;

final class FacadeDocBodyResponseBodyDenormalizer implements ContextAwareDenormalizerInterface, DenormalizerAwareInterface, CacheableSupportsMethodInterface
{
    private const ORIGINAL_STRING_FIELD_KEY = 'original_string';

    /**
     * @var SerializerInterface|DenormalizerInterface
     */
    private $denormalizer;

    /**
     * {@inheritdoc}
     */
    public function denormalize($data, $class, $format = null, array $context = [])
    {
        if (null === $this->denormalizer) {
            throw new BadMethodCallException('Please set a serializer before calling denormalize()!');
        }
        if (!\is_array($data)) {
            throw new InvalidArgumentException('Data expected to be an array, ' . \gettype($data) . ' given.');
        }
        if (Body::class !== $class) {
            throw new InvalidArgumentException('Unsupported class: ' . $class);
        }

        $data[self::ORIGINAL_STRING_FIELD_KEY] = $this->denormalizer->serialize($data, $format, $context);

        return $this->denormalizer->denormalize($data, $class, $format, $context);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return Body::class === $type
            && is_array($data)
            && !array_key_exists(self::ORIGINAL_STRING_FIELD_KEY, $data);
    }

    /**
     * {@inheritdoc}
     */
    public function setDenormalizer(DenormalizerInterface $denormalizer): void
    {
        if (!$denormalizer instanceof SerializerInterface) {
            throw new InvalidArgumentException('Denormalizer must implement serializer interface also');
        }

        $this->denormalizer = $denormalizer;
    }

    /**
     * {@inheritdoc}
     */
    public function hasCacheableSupportsMethod(): bool
    {
        return $this->denormalizer instanceof CacheableSupportsMethodInterface && $this->denormalizer->hasCacheableSupportsMethod();
    }
}
