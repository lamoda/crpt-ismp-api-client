<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class FacadeOrderResponse
{
    /**
     * @var string
     */
    private $orderId;
    /**
     * @var string
     */
    private $orderStatus;

    /**
     * * @param string $orderId
     */
    public function __construct(string $orderId, string $orderStatus)
    {
        $this->orderId = $orderId;
        $this->orderStatus = $orderStatus;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }
}
