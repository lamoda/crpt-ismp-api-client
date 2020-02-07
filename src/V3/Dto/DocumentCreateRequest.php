<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class DocumentCreateRequest
{
    /**
     * @var string
     */
    private $productDocument;
    /**
     * @var string
     */
    private $documentFormat;
    /**
     * @var string
     */
    private $signature;
    /**
     * @var string|null
     */
    private $productGroup;
    /**
     * @var string|null
     */
    private $type;

    public function __construct(
        string $productDocument,
        string $documentFormat,
        string $signature,
        string $productGroup = null,
        string $type = null
    ) {
        $this->productDocument = $productDocument;
        $this->documentFormat = $documentFormat;
        $this->signature = $signature;
        $this->productGroup = $productGroup;
        $this->type = $type;
    }

    public function getProductDocument(): string
    {
        return $this->productDocument;
    }

    public function getDocumentFormat(): string
    {
        return $this->documentFormat;
    }

    public function getSignature(): string
    {
        return $this->signature;
    }

    public function getProductGroup(): ?string
    {
        return $this->productGroup;
    }

    public function getType(): ?string
    {
        return $this->type;
    }
}
