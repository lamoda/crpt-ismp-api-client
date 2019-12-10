<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class ProductInfoResponse
{
    /**
     * @var array
     */
    private $results;
    /**
     * @var int
     */
    private $total;

    public function __construct(array $results, int $total)
    {
        $this->results = $results;
        $this->total = $total;
    }

    public function getResults(): array
    {
        return $this->results;
    }

    public function getTotal(): int
    {
        return $this->total;
    }
}
