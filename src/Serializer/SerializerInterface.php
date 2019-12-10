<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Serializer;

interface SerializerInterface
{
    public function serialize(object $object);

    public function deserialize(string $class, $data): object;
}
