<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class FacadeOrderDetailsResponse
{
    public const ORDER_STATUS_NEW = 'NEW';
    public const ORDER_STATUS_READY_FOR_EXTERNAL_PROCESSING = 'READY_FOR_EXTERNAL_PROCESSING';
    public const ORDER_STATUS_EXTERNAL_PROCESSING = 'EXTERNAL_PROCESSING';
    public const ORDER_STATUS_READY_TO_PROCESS = 'READY_TO_PROCESS';
    public const ORDER_STATUS_VALIDATING = 'VALIDATING';
    public const ORDER_STATUS_READY_TO_VALIDATE = 'READY_TO_VALIDATE';
    public const ORDER_STATUS_PROCESSED = 'PROCESSED';
    public const ORDER_STATUS_PROCESSING = 'PROCESSING';
    public const ORDER_STATUS_PRODUCTION = 'PRODUCTION';
    public const ORDER_STATUS_MK_PARTLY_EMITTED = 'MK_PARTLY_EMITTED';
    public const ORDER_STATUS_MK_EMITTED = 'MK_EMITTED';
    public const ORDER_STATUS_VALIDATION_FAILED = 'VALIDATION_FAILED';
    public const ORDER_STATUS_ERROR = 'ERROR';
    public const ORDER_STATUS_COMPLETED = 'COMPLETED';

    /**
     * @var string
     */
    private $orderId;
    /**
     * @var string
     */
    private $orderStatus;
    /**
     * @var string | null
     */
    private $orderStatusDetails;
    /**
     * @var int
     */
    private $orderCreationDate;

    public function __construct(string $orderId, string $orderStatus, int $orderCreationDate)
    {
        $this->orderId = $orderId;
        $this->orderStatus = $orderStatus;
        $this->orderCreationDate = $orderCreationDate;
    }

    public function getOrderId(): string
    {
        return $this->orderId;
    }

    public function getOrderStatus(): string
    {
        return $this->orderStatus;
    }

    public function setOrderStatusDetails(?string $orderStatusDetails): FacadeOrderDetailsResponse
    {
        $this->orderStatusDetails = $orderStatusDetails;

        return $this;
    }

    public function getOrderStatusDetails(): ?string
    {
        return $this->orderStatusDetails;
    }

    public function getOrderCreationDate(): int
    {
        return $this->orderCreationDate;
    }
}
