<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class FacadeMarkedProductsResponse
{
    public const STATUS_INTRODUCED = 'INTRODUCED';
    public const STATUS_RETIRED = 'RETIRED';

    public const EMISSION_TYPE_LOCAL = 'LOCAL';
    public const EMISSION_TYPE_FOREIGN = 'FOREIGN';
    public const EMISSION_TYPE_REMAINS = 'REMAINS';
    public const EMISSION_TYPE_CROSSBORDER = 'CROSSBORDER';

    public const STATUS_EXT_WAIT_SHIPMENT = 'WAIT_SHIPMENT';
    public const STATUS_EXT_WAIT_TRANSFER_TO_OWNER = 'WAIT_TRANSFER_TO_OWNER';
    public const STATUS_EXT_WAIT_REMARK = 'WAIT_REMARK';

    public const WITHDRAW_REASON_RETAIL = 'RETAIL';
    public const WITHDRAW_REASON_EEC_EXPORT = 'EEC_EXPORT';
    public const WITHDRAW_REASON_BEYOND_EEC_EXPORT = 'BEYOND_EEC_EXPORT';
    public const WITHDRAW_REASON_RETURN = 'RETURN';
    public const WITHDRAW_REASON_DAMAGE_LOSS = 'DAMAGE_LOSS';
    public const WITHDRAW_REASON_DESTRUCTION = 'DESTRUCTION';
    public const WITHDRAW_REASON_CONFISCATION = 'CONFISCATION';
    public const WITHDRAW_REASON_LIQUIDATION = 'LIQUIDATION';
    public const WITHDRAW_REASON_DONATION = 'DONATION';
    public const WITHDRAW_REASON_STATE_ENTERPRISE = 'STATE_ENTERPRISE';
    public const WITHDRAW_REASON_NO_RETAIL_USE = 'NO_RETAIL_USE';
    public const WITHDRAW_REASON_ENTERPRISE_USE = 'ENTERPRISE_USE';

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
     * @SerializedName("tnVed")
     */
    private $tnVed;
    /**
     * @var string
     * @SerializedName("productName")
     */
    private $productName;
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
     * @SerializedName("producerName")
     */
    private $producerName;
    /**
     * @var string
     * @SerializedName("producerInn")
     */
    private $producerInn;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     * @SerializedName("emissionDate")
     */
    private $emissionDate;
    /**
     * @var string
     * @SerializedName("emissionType")
     */
    private $emissionType;
    /**
     * @var string
     * @SerializedName("statusExt")
     */
    private $statusExt;
    /**
     * @var string
     * @SerializedName("withdrawReason")
     */
    private $withdrawReason;
    /**
     * @var string
     */
    private $name;
    /**
     * @var string
     */
    private $brand;
    /**
     * @var string
     */
    private $model;
    /**
     * @var FacadeMarkedProductsCertDoc
     * @SerializedName("certDoc")
     */
    private $certDoc;
    /**
     * @var string
     */
    private $country;
    /**
     * @var string
     * @SerializedName("productTypeDesc")
     */
    private $productTypeDesc;
    /**
     * @var string
     */
    private $color;
    /**
     * @var string
     * @SerializedName("materialDown")
     */
    private $materialDown;
    /**
     * @var string
     * @SerializedName("productSize")
     */
    private $productSize;
    /**
     * @var string
     * @SerializedName("materialUpper")
     */
    private $materialUpper;
    /**
     * @var string
     * @SerializedName("materialLining")
     */
    private $materialLining;
    /**
     * @var string
     * @SerializedName("packageType")
     */
    private $packageType;
    /**
     * @var string
     * @SerializedName("productType")
     */
    private $productType;

    public function __construct(
        string $cis,
        string $gtin,
        string $tnVed,
        string $productName,
        string $ownerName,
        string $ownerInn,
        string $producerName,
        string $producerInn,
        string $status,
        string $emissionDate,
        string $emissionType,
        string $statusExt,
        string $withdrawReason,
        string $name,
        string $brand,
        string $model,
        FacadeMarkedProductsCertDoc $certDoc,
        string $country,
        string $productTypeDesc,
        string $color,
        string $materialDown,
        string $productSize,
        string $materialUpper,
        string $materialLining,
        string $packageType,
        string $productType
    )
    {
        $this->cis = $cis;
        $this->gtin = $gtin;
        $this->tnVed = $tnVed;
        $this->productName = $productName;
        $this->ownerName = $ownerName;
        $this->ownerInn = $ownerInn;
        $this->producerName = $producerName;
        $this->producerInn = $producerInn;
        $this->status = $status;
        $this->emissionDate = $emissionDate;
        $this->emissionType = $emissionType;
        $this->statusExt = $statusExt;
        $this->withdrawReason = $withdrawReason;
        $this->name = $name;
        $this->brand = $brand;
        $this->model = $model;
        $this->certDoc = $certDoc;
        $this->country = $country;
        $this->productTypeDesc = $productTypeDesc;
        $this->color = $color;
        $this->materialDown = $materialDown;
        $this->productSize = $productSize;
        $this->materialUpper = $materialUpper;
        $this->materialLining = $materialLining;
        $this->packageType = $packageType;
        $this->productType = $productType;
    }

    public function getCis(): string
    {
        return $this->cis;
    }

    public function getGtin(): string
    {
        return $this->gtin;
    }

    public function getTnVed(): string
    {
        return $this->tnVed;
    }

    public function getProductName(): string
    {
        return $this->productName;
    }

    public function getOwnerName(): string
    {
        return $this->ownerName;
    }

    public function getOwnerInn(): string
    {
        return $this->ownerInn;
    }

    public function getProducerName(): string
    {
        return $this->producerName;
    }

    public function getProducerInn(): string
    {
        return $this->producerInn;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getEmissionDate(): string
    {
        return $this->emissionDate;
    }

    public function getEmissionType(): string
    {
        return $this->emissionType;
    }

    public function getStatusExt(): string
    {
        return $this->statusExt;
    }

    public function getWithdrawReason(): string
    {
        return $this->withdrawReason;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getBrand(): string
    {
        return $this->brand;
    }

    public function getModel(): string
    {
        return $this->model;
    }

    public function getCertDoc(): FacadeMarkedProductsCertDoc
    {
        return $this->certDoc;
    }

    public function getCountry(): string
    {
        return $this->country;
    }

    public function getProductTypeDesc(): string
    {
        return $this->productTypeDesc;
    }

    public function getColor(): string
    {
        return $this->color;
    }

    public function getMaterialDown(): string
    {
        return $this->materialDown;
    }

    public function getProductSize(): string
    {
        return $this->productSize;
    }

    public function getMaterialUpper(): string
    {
        return $this->materialUpper;
    }

    public function getMaterialLining(): string
    {
        return $this->materialLining;
    }

    public function getPackageType(): string
    {
        return $this->packageType;
    }

    public function getProductType(): string
    {
        return $this->productType;
    }
}
