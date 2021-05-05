<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse\Body;

class DocumentDescription
{
    /**
     * @var string|null
     */
    private $participantInn;
    /**
     * @var string|null
     */
    private $markingType;
    /**
     * @var string|null
     */
    private $productionDate;
    /**
     * @var string|null
     */
    private $productionType;
    /**
     * @var string|null
     */
    private $producerInn;
    /**
     * @var string|null
     */
    private $ownerInn;

    public function getParticipantInn(): ?string
    {
        return $this->participantInn;
    }

    public function setParticipantInn(?string $participantInn): self
    {
        $this->participantInn = $participantInn;

        return $this;
    }

    public function getMarkingType(): ?string
    {
        return $this->markingType;
    }

    public function setMarkingType(?string $markingType): self
    {
        $this->markingType = $markingType;

        return $this;
    }

    public function getProductionDate(): ?string
    {
        return $this->productionDate;
    }

    public function setProductionDate(?string $productionDate): self
    {
        $this->productionDate = $productionDate;

        return $this;
    }

    public function getProductionType(): ?string
    {
        return $this->productionType;
    }

    public function setProductionType(?string $productionType): self
    {
        $this->productionType = $productionType;

        return $this;
    }

    public function getProducerInn(): ?string
    {
        return $this->producerInn;
    }

    public function setProducerInn(?string $producerInn): self
    {
        $this->producerInn = $producerInn;

        return $this;
    }

    public function getOwnerInn(): ?string
    {
        return $this->ownerInn;
    }

    public function setOwnerInn(?string $ownerInn): self
    {
        $this->ownerInn = $ownerInn;

        return $this;
    }
}
