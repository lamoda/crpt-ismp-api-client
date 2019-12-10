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
        int $countChildren
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
     * @return string
     */
    public function getProducerName(): string
    {
        return $this->producerName;
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
     * @return string
     */
    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    /**
     * @return string
     */
    public function getOwnerInn(): string
    {
        return $this->ownerInn;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->productName;
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return int
     */
    public function getCountChildren(): int
    {
        return $this->countChildren;
    }
}
