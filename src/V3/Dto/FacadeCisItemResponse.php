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

    /**
     * @return string
     */
    public function getCis(): string
    {
        return $this->cis;
    }

    /**
     * @return string
     */
    public function getGtin(): string
    {
        return $this->gtin;
    }

    /**
     * @return string|null
     */
    public function getProducerName(): ?string
    {
        return $this->producerName;
    }

    public function setProducerName(string $producerName): void
    {
        $this->producerName = $producerName;
    }

    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }

    /**
     * @return int
     */
    public function getEmissionDate(): int
    {
        return $this->emissionDate;
    }

    /**
     * @return string
     */
    public function getPackageType(): string
    {
        return $this->packageType;
    }

    /**
     * @return string|null
     */
    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    public function setOwnerName(string $ownerName): void
    {
        $this->ownerName = $ownerName;
    }

    /**
     * @return string|null
     */
    public function getOwnerInn(): ?string
    {
        return $this->ownerInn;
    }

    public function setOwnerInn(string $ownerInn): void
    {
        $this->ownerInn = $ownerInn;
    }

    /**
     * @return int
     */
    public function getCountChildren(): int
    {
        return $this->countChildren;
    }

    /**
     * @return string|null
     */
    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(string $productName): void
    {
        $this->productName = $productName;
    }

    /**
     * @return string|null
     */
    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): void
    {
        $this->brand = $brand;
    }
}
