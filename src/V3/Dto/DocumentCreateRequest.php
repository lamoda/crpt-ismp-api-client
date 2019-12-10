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

    public function __construct(string $productDocument, string $documentFormat, string $signature)
    {
        $this->productDocument = $productDocument;
        $this->documentFormat = $documentFormat;
        $this->signature = $signature;
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
}
