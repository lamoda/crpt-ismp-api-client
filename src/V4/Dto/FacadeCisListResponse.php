<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4\Dto;

final class FacadeCisListResponse
{
    /**
     * @var FacadeCisItemResponse[]
     */
    private $items = [];

    /**
     * @param FacadeCisItemResponse ...$items
     */
    public function __construct(FacadeCisItemResponse ...$items)
    {
        $this->setItems(...$items);
    }

    /**
     * @return FacadeCisItemResponse[]
     */
    public function getItems(): array
    {
        return $this->items;
    }

    public function setItems(FacadeCisItemResponse ...$items): self
    {
        foreach ($items as $item) {
            $this->items[$item->getCis()] = $item;
        }
        return $this;
    }
}
