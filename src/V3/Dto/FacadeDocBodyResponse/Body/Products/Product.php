<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse\Body\Products;

class Product
{
    /**
     * @var string
     */
    private $uituCode;
    /**
     * @var string
     */
    private $uitCode;
    /**
     * @var string
     */
    private $tnvedCode;
    /**
     * @var string
     */
    private $producerInn;
    /**
     * @var string
     */
    private $ownerInn;
    /**
     * @var string
     */
    private $certificateDocument;
    /**
     * @var string
     */
    private $certificateDocumentNumber;
    /**
     * @var string
     */
    private $certificateDocumentDate;

    public function getUituCode(): string
    {
        return $this->uituCode;
    }

    public function setUituCode(string $uituCode): self
    {
        $this->uituCode = $uituCode;

        return $this;
    }

    public function getUitCode(): string
    {
        return $this->uitCode;
    }

    public function setUitCode(string $uitCode): self
    {
        $this->uitCode = $uitCode;

        return $this;
    }

    public function getTnvedCode(): string
    {
        return $this->tnvedCode;
    }

    public function setTnvedCode(string $tnvedCode): self
    {
        $this->tnvedCode = $tnvedCode;

        return $this;
    }

    public function getProducerInn(): string
    {
        return $this->producerInn;
    }

    public function setProducerInn(string $producerInn): self
    {
        $this->producerInn = $producerInn;

        return $this;
    }

    public function getOwnerInn(): string
    {
        return $this->ownerInn;
    }

    public function setOwnerInn(string $ownerInn): self
    {
        $this->ownerInn = $ownerInn;

        return $this;
    }

    public function getCertificateDocument(): string
    {
        return $this->certificateDocument;
    }

    public function setCertificateDocument(string $certificateDocument): self
    {
        $this->certificateDocument = $certificateDocument;

        return $this;
    }

    public function getCertificateDocumentNumber(): string
    {
        return $this->certificateDocumentNumber;
    }

    public function setCertificateDocumentNumber(string $certificateDocumentNumber): self
    {
        $this->certificateDocumentNumber = $certificateDocumentNumber;

        return $this;
    }

    public function getCertificateDocumentDate(): string
    {
        return $this->certificateDocumentDate;
    }

    public function setCertificateDocumentDate(string $certificateDocumentDate): self
    {
        $this->certificateDocumentDate = $certificateDocumentDate;

        return $this;
    }
}
