<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class FacadeCisListResponse
{
    /**
     * @var FacadeCisItemResponse[]
     */
    public $items = [];

    /**
     * @param FacadeCisItemResponse ...$items
     */
    public function __construct(FacadeCisItemResponse ...$items)
    {
        foreach ($items as $item) {
            $this->items[$item->getCis()] = $item;
        }
    }
}
