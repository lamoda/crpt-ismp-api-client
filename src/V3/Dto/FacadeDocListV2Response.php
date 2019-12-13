<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class FacadeDocListV2Response
{
    /**
     * @var int
     */
    private $total;
    /**
     * @var FacadeDocListV2ItemResponse[]
     */
    private $results;

    /**
     * @param int $total
     * @param FacadeDocListV2ItemResponse[] $results
     */
    public function __construct(int $total, array $results = [])
    {
        $this->total = $total;
        $this->results = $results;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @return FacadeDocListV2ItemResponse[]
     */
    public function getResults(): array
    {
        return $this->results;
    }
}
