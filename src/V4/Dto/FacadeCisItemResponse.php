<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class FacadeCisItemResponse
{
    public const STATUS_EMITTED = 'EMITTED';
    public const STATUS_APPLIED = 'APPLIED';
    public const STATUS_INTRODUCED = 'INTRODUCED';
    public const STATUS_RETIRED = 'RETIRED';
    public const STATUS_WRITTEN_OFF = 'WRITTEN_OFF';
    public const STATUS_ISSUED = 'ISSUED';

    /**
     * @var string
     */
    private $cis;
    /**
     * @var string
     */
    private $gtin;
    /**
     * @var string|null
     * @SerializedName("producerName")
     */
    private $producerName;
    /**
     * @var string
     */
    private $status;
    /**
     * @var int
     * @SerializedName("emissionDate")
     */
    private $emissionDate;
    /**
     * @var string
     * @SerializedName("packageType")
     */
    private $packageType;
    /**
     * @var string|null
     * @SerializedName("ownerName")
     */
    private $ownerName;
    /**
     * @var string|null
     * @SerializedName("ownerInn")
     */
    private $ownerInn;
    /**
     * @var string|null
     * @SerializedName("productName")
     */
    private $productName;
    /**
     * @var string|null
     */
    private $brand;
    /**
     * @var int
     * @SerializedName("countChildren")
     */
    private $countChildren;
    /**
     * @var string|null
     * @SerializedName("agentInn")
     */
    private $agentInn;
    /**
     * @var string|null
     * @SerializedName("agentName")
     */
    private $agentName;

    public function __construct(
        string $cis,
        string $gtin,
        string $status,
        int $emissionDate,
        string $packageType,
        int $countChildren
    ) {
        $this->cis = $cis;
        $this->gtin = $gtin;
        $this->status = $status;
        $this->emissionDate = $emissionDate;
        $this->packageType = $packageType;
        $this->countChildren = $countChildren;
    }

    public function getCis(): string
    {
        return $this->cis;
    }

    public function getGtin(): string
    {
        return $this->gtin;
    }

    public function getProducerName(): ?string
    {
        return $this->producerName;
    }

    public function setProducerName(string $producerName): void
    {
        $this->producerName = $producerName;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getEmissionDate(): int
    {
        return $this->emissionDate;
    }

    public function getPackageType(): string
    {
        return $this->packageType;
    }

    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): void
    {
        $this->ownerName = $ownerName;
    }

    public function getOwnerInn(): ?string
    {
        return $this->ownerInn;
    }

    public function setOwnerInn(string $ownerInn): void
    {
        $this->ownerInn = $ownerInn;
    }

    public function getCountChildren(): int
    {
        return $this->countChildren;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }

    public function getAgentInn(): ?string
    {
        return $this->agentInn;
    }

    public function setAgentInn(?string $agentInn): void
    {
        $this->agentInn = $agentInn;
    }

    public function getAgentName(): ?string
    {
        return $this->agentName;
    }

    public function setAgentName(?string $agentName): void
    {
        $this->agentName = $agentName;
    }
}
