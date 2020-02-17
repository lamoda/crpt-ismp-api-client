<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

use Symfony\Component\Serializer\Annotation\SerializedName;

final class FacadeMarkedProductsResponse
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
     * @SerializedName("sgtin")
     */
    private $sgtin;
    /**
     * @var string|null
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
     * @var string|null
     * @SerializedName("agentName")
     */
    private $agentName;
    /**
     * @var string|null
     * @SerializedName("agentInn")
     */
    private $agentInn;
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
     * @var string|null
     * @SerializedName("introducedDate")
     */
    private $introducedDate;
    /**
     * @var string|null
     */
    private $name;
    /**
     * @var string|null
     */
    private $brand;
    /**
     * @var string|null
     */
    private $model;
    /**
     * @var FacadeMarkedProductsCertDoc[]
     * @SerializedName("prevCises")
     */
    private $prevCises;
    /**
     * @var FacadeMarkedProductsCertDoc[]
     * @SerializedName("nextCises")
     */
    private $nextCises;
    /**
     * @var string|null
     */
    private $country;
    /**
     * @var string|null
     * @SerializedName("productTypeDesc")
     */
    private $productTypeDesc;
    /**
     * @var string|null
     */
    private $color;
    /**
     * @var string|null
     * @SerializedName("materialDown")
     */
    private $materialDown;
    /**
     * @var string|null
     * @SerializedName("materialUpper")
     */
    private $materialUpper;
    /**
     * @var string|null
     * @SerializedName("materialLining")
     */
    private $materialLining;
    /**
     * @var string
     * @SerializedName("packType")
     */
    private $packType;
    /**
     * @var int
     * @SerializedName("countChildren")
     */
    private $countChildren;
    /**
     * @var string|null
     * @SerializedName("goodSignedFlag")
     */
    private $goodSignedFlag;
    /**
     * @var string|null
     * @SerializedName("goodTurnFlag")
     */
    private $goodTurnFlag;
    /**
     * @var string|null
     * @SerializedName("goodMarkFlag")
     */
    private $goodMarkFlag;
    /**
     * @var string|null
     * @SerializedName("lastDocId")
     */
    private $lastDocId;

    public function __construct(
        string $cis,
        string $gtin,
        string $sgtin,
        string $ownerName,
        string $ownerInn,
        string $producerName,
        string $producerInn,
        string $status,
        string $emissionDate,
        string $emissionType,
        array $prevCises,
        array $nextCises,
        string $packType,
        int $countChildren
    ) {
        $this->cis = $cis;
        $this->gtin = $gtin;
        $this->sgtin = $sgtin;
        $this->ownerName = $ownerName;
        $this->ownerInn = $ownerInn;
        $this->producerName = $producerName;
        $this->producerInn = $producerInn;
        $this->status = $status;
        $this->emissionDate = $emissionDate;
        $this->emissionType = $emissionType;
        $this->prevCises = $prevCises;
        $this->nextCises = $nextCises;
        $this->packType = $packType;
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

    public function getSgtin(): string
    {
        return $this->sgtin;
    }

    public function getProductName(): ?string
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

    public function getAgentName(): ?string
    {
        return $this->agentName;
    }

    public function getAgentInn(): ?string
    {
        return $this->agentInn;
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

    public function getIntroducedDate(): ?string
    {
        return $this->introducedDate;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function getModel(): ?string
    {
        return $this->model;
    }

    /**
     * @return FacadeMarkedProductsCertDoc[]
     */
    public function getPrevCises(): array
    {
        return $this->prevCises;
    }

    /**
     * @return FacadeMarkedProductsCertDoc[]
     */
    public function getNextCises(): array
    {
        return $this->nextCises;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function getProductTypeDesc(): ?string
    {
        return $this->productTypeDesc;
    }

    public function getColor(): ?string
    {
        return $this->color;
    }

    public function getMaterialDown(): ?string
    {
        return $this->materialDown;
    }

    public function getMaterialUpper(): ?string
    {
        return $this->materialUpper;
    }

    public function getMaterialLining(): ?string
    {
        return $this->materialLining;
    }

    public function getPackType(): string
    {
        return $this->packType;
    }

    public function getCountChildren(): int
    {
        return $this->countChildren;
    }

    public function getGoodSignedFlag(): ?string
    {
        return $this->goodSignedFlag;
    }

    public function getGoodTurnFlag(): ?string
    {
        return $this->goodTurnFlag;
    }

    public function getGoodMarkFlag(): ?string
    {
        return $this->goodMarkFlag;
    }

    public function getLastDocId(): ?string
    {
        return $this->lastDocId;
    }

    public function setProductName(?string $productName): FacadeMarkedProductsResponse
    {
        $this->productName = $productName;
        return $this;
    }

    public function setAgentName(?string $agentName): FacadeMarkedProductsResponse
    {
        $this->agentName = $agentName;
        return $this;
    }

    public function setAgentInn(?string $agentInn): FacadeMarkedProductsResponse
    {
        $this->agentInn = $agentInn;
        return $this;
    }

    public function setIntroducedDate(?string $introducedDate): FacadeMarkedProductsResponse
    {
        $this->introducedDate = $introducedDate;
        return $this;
    }

    public function setName(?string $name): FacadeMarkedProductsResponse
    {
        $this->name = $name;
        return $this;
    }

    public function setBrand(?string $brand): FacadeMarkedProductsResponse
    {
        $this->brand = $brand;
        return $this;
    }

    public function setModel(?string $model): FacadeMarkedProductsResponse
    {
        $this->model = $model;
        return $this;
    }

    public function setCountry(?string $country): FacadeMarkedProductsResponse
    {
        $this->country = $country;
        return $this;
    }

    public function setProductTypeDesc(?string $productTypeDesc): FacadeMarkedProductsResponse
    {
        $this->productTypeDesc = $productTypeDesc;
        return $this;
    }

    public function setColor(?string $color): FacadeMarkedProductsResponse
    {
        $this->color = $color;
        return $this;
    }

    public function setMaterialDown(?string $materialDown): FacadeMarkedProductsResponse
    {
        $this->materialDown = $materialDown;
        return $this;
    }

    public function setMaterialUpper(?string $materialUpper): FacadeMarkedProductsResponse
    {
        $this->materialUpper = $materialUpper;
        return $this;
    }

    public function setMaterialLining(?string $materialLining): FacadeMarkedProductsResponse
    {
        $this->materialLining = $materialLining;
        return $this;
    }

    public function setGoodSignedFlag(?string $goodSignedFlag): FacadeMarkedProductsResponse
    {
        $this->goodSignedFlag = $goodSignedFlag;
        return $this;
    }

    public function setGoodTurnFlag(?string $goodTurnFlag): FacadeMarkedProductsResponse
    {
        $this->goodTurnFlag = $goodTurnFlag;
        return $this;
    }

    public function setGoodMarkFlag(?string $goodMarkFlag): FacadeMarkedProductsResponse
    {
        $this->goodMarkFlag = $goodMarkFlag;
        return $this;
    }

    public function setLastDocId(?string $lastDocId): FacadeMarkedProductsResponse
    {
        $this->lastDocId = $lastDocId;
        return $this;
    }
}
