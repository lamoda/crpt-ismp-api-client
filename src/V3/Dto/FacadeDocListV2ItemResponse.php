<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class FacadeDocListV2ItemResponse
{
    /**
     * @var string
     */
    private $number;
    /**
     * @var string
     * @SerializedName("docDate")
     */
    private $docDate;
    /**
     * @var string
     * @SerializedName("receivedAt")
     */
    private $receivedAt;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     * @SerializedName("senderName")
     */
    private $senderName;

    public function __construct(
        string $number,
        string $docDate,
        string $receivedAt,
        string $type,
        string $status,
        string $senderName
    ) {
        $this->number = $number;
        $this->docDate = $docDate;
        $this->receivedAt = $receivedAt;
        $this->type = $type;
        $this->status = $status;
        $this->senderName = $senderName;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getDocDate(): string
    {
        return $this->docDate;
    }

    public function getReceivedAt(): string
    {
        return $this->receivedAt;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getSenderName(): string
    {
        return $this->senderName;
    }
}