<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4\Dto;

final class FacadeCisItemResponse
{
    public const STATUS_EMITTED = 'EMITTED';
    public const STATUS_APPLIED = 'APPLIED';
    public const STATUS_INTRODUCED = 'INTRODUCED';
    public const STATUS_WRITTEN_OFF = 'WRITTEN_OFF';
    public const STATUS_RETIRED = 'RETIRED';
    public const STATUS_DISAGGREGATION = 'DISAGGREGATION';

    /** @var string */
    private $cis;
    /** @var string|null */
    private $gtin = null;
    /** @var string|null */
    private $producerName = null;
    /** @var string */
    private $status;
    /** @var string */
    private $emissionDate;
    /** @var string */
    private $emissionType;
    /** @var string|null */
    private $producedDate = null;
    /** @var string|null */
    private $packType;
    /** @var string|null */
    private $ownerName = null;
    /** @var string|null */
    private $ownerInn = null;
    /** @var string|null */
    private $productName = null;
    /** @var string|null */
    private $brand = null;
    /** @var string[]|null */
    private $prevCises = null;
    /** @var string[]|null */
    private $nextCises = null;
    /** @var string|null */
    private $statusEx = null;
    /** @var FacadeCisItemResponse[] */
    private $children = [];
    /** @var int|null */
    private $countChildren = null;
    /**ъ @var string|null */
    private $parent= null;
    /** @var string|null */
    private $lastDocId= null;
    /** @var string|null */
    private $introducedDate = null;
    /** @var string|null */
    private $agentInn= null;
    /** @var string|null */
    private $agentName= null;
    /** @var string */
    private $lastStatusChangeDate;
    /** @var string|null */
    private $turnoverType= null;
    /** @var string */
    private $productGroup;
    /** @var string|null */
    private $tnVed10= null;
    /** @var bool|null */
    private $markWithdraw = null;
    /** @var array|null */
    private $certDoc = null;

    public function getCis(): string
    {
        return $this->cis;
    }

    public function setCis(string $cis): void
    {
        $this->cis = $cis;
    }

    public function getGtin(): ?string
    {
        return $this->gtin;
    }

    public function setGtin(?string $gtin): void
    {
        $this->gtin = $gtin;
    }

    public function getProducerName(): ?string
    {
        return $this->producerName;
    }

    public function setProducerName(?string $producerName): void
    {
        $this->producerName = $producerName;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    public function getEmissionDate(): string
    {
        return $this->emissionDate;
    }

    public function setEmissionDate(string $emissionDate): void
    {
        $this->emissionDate = $emissionDate;
    }

    public function getEmissionType(): string
    {
        return $this->emissionType;
    }

    public function setEmissionType(string $emissionType): void
    {
        $this->emissionType = $emissionType;
    }

    public function getProducedDate(): ?string
    {
        return $this->producedDate;
    }

    public function setProducedDate(?string $producedDate): void
    {
        $this->producedDate = $producedDate;
    }

    public function getPackType(): string
    {
        return $this->packType;
    }

    public function setPackType(string $packType): void
    {
        $this->packType = $packType;
    }

    public function getOwnerName(): ?string
    {
        return $this->ownerName;
    }

    public function setOwnerName(?string $ownerName): void
    {
        $this->ownerName = $ownerName;
    }

    public function getOwnerInn(): ?string
    {
        return $this->ownerInn;
    }

    public function setOwnerInn(?string $ownerInn): void
    {
        $this->ownerInn = $ownerInn;
    }

    public function getProductName(): ?string
    {
        return $this->productName;
    }

    public function setProductName(?string $productName): void
    {
        $this->productName = $productName;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(?string $brand): void
    {
        $this->brand = $brand;
    }

    public function getPrevCises(): ?array
    {
        return $this->prevCises;
    }

    public function setPrevCises(?array $prevCises): void
    {
        $this->prevCises = $prevCises;
    }

    public function getNextCises(): ?array
    {
        return $this->nextCises;
    }

    public function setNextCises(?array $nextCises): void
    {
        $this->nextCises = $nextCises;
    }

    public function getStatusEx(): ?string
    {
        return $this->statusEx;
    }

    public function setStatusEx(?string $statusEx): void
    {
        $this->statusEx = $statusEx;
    }

    public function getChildren(): ?array
    {
        return $this->children;
    }

    public function setChildren(array $children): void
    {
        $this->children = $children;
    }

    public function getCountChildren(): ?int
    {
        return $this->countChildren;
    }

    public function setCountChildren(?int $countChildren): void
    {
        $this->countChildren = $countChildren;
    }

    public function getParent(): ?string
    {
        return $this->parent;
    }

    public function setParent(?string $parent): void
    {
        $this->parent = $parent;
    }

    public function getLastDocId(): ?string
    {
        return $this->lastDocId;
    }

    public function setLastDocId(?string $lastDocId): void
    {
        $this->lastDocId = $lastDocId;
    }

    public function getIntroducedDate(): ?string
    {
        return $this->introducedDate;
    }

    public function setIntroducedDate(?string $introducedDate): void
    {
        $this->introducedDate = $introducedDate;
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

    public function getLastStatusChangeDate(): string
    {
        return $this->lastStatusChangeDate;
    }

    public function setLastStatusChangeDate(string $lastStatusChangeDate): void
    {
        $this->lastStatusChangeDate = $lastStatusChangeDate;
    }

    public function getTurnoverType(): ?string
    {
        return $this->turnoverType;
    }

    public function setTurnoverType(?string $turnoverType): void
    {
        $this->turnoverType = $turnoverType;
    }

    public function getProductGroup(): string
    {
        return $this->productGroup;
    }

    public function setProductGroup(string $productGroup): void
    {
        $this->productGroup = $productGroup;
    }

    public function getTnVed10(): ?string
    {
        return $this->tnVed10;
    }

    public function setTnVed10(?string $tnVed10): void
    {
        $this->tnVed10 = $tnVed10;
    }

    public function getMarkWithdraw(): ?bool
    {
        return $this->markWithdraw;
    }

    public function setMarkWithdraw(?bool $markWithdraw): void
    {
        $this->markWithdraw = $markWithdraw;
    }

    public function getCertDoc(): ?array
    {
        return $this->certDoc;
    }

    public function setCertDoc(?array $certDoc): void
    {
        $this->certDoc = $certDoc;
    }
}
