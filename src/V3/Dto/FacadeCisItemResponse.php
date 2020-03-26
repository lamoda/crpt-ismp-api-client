<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class FacadeCisItemResponse
{
    public const STATUS_EMITTED = 'EMITTED';
    public const STATUS_APPLIED = 'APPLIED';
    public const STATUS_INTRODUCED = 'INTRODUCED';
    public const STATUS_RETIRED = 'RETIRED';
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
     * @var string
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
     * @var string
     * @SerializedName("ownerName")
     */
    private $ownerName;
    /**
     * @var string
     * @SerializedName("ownerInn")
     */
    private $ownerInn;
    /**
     * @var string
     * @SerializedName("productName")
     */
    private $productName;
    /**
     * @var string
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
        string $producerName,
        string $status,
        int $emissionDate,
        string $packageType,
        string $ownerName,
        string $ownerInn,
        string $productName,
        string $brand,
        int $countChildren,
        ?string $agentInn = null,
        ?string $agentName = null
    ) {
        $this->cis = $cis;
        $this->gtin = $gtin;
        $this->producerName = $producerName;
        $this->status = $status;
        $this->emissionDate = $emissionDate;
        $this->packageType = $packageType;
        $this->ownerName = $ownerName;
        $this->ownerInn = $ownerInn;
        $this->productName = $productName;
        $this->brand = $brand;
        $this->countChildren = $countChildren;
        $this->agentInn = $agentInn;
        $this->agentName = $agentName;
    }

    public function getCis(): string
    {
        return $this->cis;
    }

    public function getGtin(): string
    {
        return $this->gtin;
    }

    public function getProducerName(): string
    {
        return $this->producerName;
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

    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    public function getOwnerInn(): string
    {
        return $this->ownerInn;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getCountChildren(): int
    {
        return $this->countChildren;
    }

    public function getAgentInn(): ?string
    {
        return $this->agentInn;
    }

    public function getAgentName(): ?string
    {
        return $this->agentName;
    }
}
