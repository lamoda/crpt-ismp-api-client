<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Impl\Serializer\V3;

use Lamoda\IsmpClient\V3\Dto\FacadeCisItemResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeCisListResponse;
use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Exception\NotNormalizableValueException;
use Symfony\Component\Serializer\Normalizer\CacheableSupportsMethodInterface;
use Symfony\Component\Serializer\Normalizer\ContextAwareDenormalizerInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerAwareInterface;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class FacadeCisListResponseDenormalizer implements ContextAwareDenormalizerInterface, DenormalizerAwareInterface, CacheableSupportsMethodInterface
{
    /**
     * @var DenormalizerInterface
     */
    private $denormalizer;

    /**
     * {@inheritdoc}
     *
     * @throws NotNormalizableValueException
     */
    public function denormalize($data, $class, $format = null, array $context = []): FacadeCisListResponse
    {
        if (null === $this->denormalizer) {
            throw new BadMethodCallException('Please set a serializer before calling denormalize()!');
        }
        if (!\is_array($data)) {
            throw new InvalidArgumentException('Data expected to be an array, ' . \gettype($data) . ' given.');
        }
        if (FacadeCisListResponse::class !== $class) {
            throw new InvalidArgumentException('Unsupported class: ' . $class);
        }

        $items = [];
        foreach ($data as $datum) {
            $items[] = $this->denormalizer->denormalize($datum, FacadeCisItemResponse::class, $format, $context);
        }

        return new FacadeCisListResponse(...$items);
    }

    /**
     * {@inheritdoc}
     */
    public function supportsDenormalization($data, $type, $format = null, array $context = []): bool
    {
        return FacadeCisListResponse::class === $type;
    }

    /**
     * {@inheritdoc}
     */
    public function setDenormalizer(DenormalizerInterface $denormalizer)
    {
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
