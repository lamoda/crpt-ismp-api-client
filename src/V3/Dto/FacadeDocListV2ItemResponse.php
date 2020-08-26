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
     * @var string|null
     */
    private $type;
    /**
     * @var string|null
     */
    private $status;
    /**
     * @var string|null
     * @SerializedName("senderName")
     */
    private $senderName;

    public function __construct(
        string $number,
        string $docDate,
        string $receivedAt
    ) {
        $this->number = $number;
        $this->docDate = $docDate;
        $this->receivedAt = $receivedAt;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getDocDate(): string
    {
        return $this->docDate;
    }

    /**
     * @throws \Exception
     */
    public function getDocDateDateTime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->docDate);
    }

    public function getReceivedAt(): string
    {
        return $this->receivedAt;
    }

    /**
     * @throws \Exception
     */
    public function getReceivedAtDateTime(): \DateTimeImmutable
    {
        return new \DateTimeImmutable($this->receivedAt);
    }

    public function setType(?string $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function setSenderName(?string $senderName): self
    {
        $this->senderName = $senderName;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function getSenderName(): ?string
    {
        return $this->senderName;
    }
}
