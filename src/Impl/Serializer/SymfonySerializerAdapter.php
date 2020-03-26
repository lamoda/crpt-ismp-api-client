<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Impl\Serializer;

use Lamoda\IsmpClient\Exception\IsmpSerializerErrorException;
use Lamoda\IsmpClient\Serializer\SerializerInterface;
use Symfony\Component\Serializer\Serializer as SymfonySerializer;

final class SymfonySerializerAdapter implements SerializerInterface
{
    /**
     * @var SymfonySerializer
     */
    private $serializer;

    public function __construct(SymfonySerializer $serializer)
    {
        $this->serializer = $serializer;
    }

    public function serialize(object $object)
    {
        try {
            return $this->serializer->serialize($object, 'json');
        } catch (\Throwable $throwable) {
            throw IsmpSerializerErrorException::becauseOfError($throwable);
        }
    }

    public function deserialize(string $class, $data): object
    {
        try {
            return $this->serializer->deserialize($data, $class, 'json');
        } catch (\Throwable $throwable) {
            throw IsmpSerializerErrorException::becauseOfError($throwable);
        }
    }
}
