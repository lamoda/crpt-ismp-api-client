<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class FacadeOrderRequest
{
    /**
     * @var string
     */
    private $document;
    /**
     * @var string
     */
    private $documentFormat;
    /**
     * @var string
     */
    private $signature;

    public function __construct(string $document, string $documentFormat, string $signature)
    {
        $this->document = $document;
        $this->documentFormat = $documentFormat;
        $this->signature = $signature;
    }

    public function getDocument(): string
    {
        return $this->document;
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
