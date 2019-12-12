<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse;

use Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse\Body\DocumentDescription;
use Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse\Body\Products\Product;

class Body
{
    /**
     * @var string
     */
    private $originalString;
    /**
     * @var string
     */
    private $regDate;
    /**
     * @var DocumentDescription
     */
    private $documentDescription;
    /**
     * @var string
     */
    private $docType;
    /**
     * @var string
     */
    private $receiver;
    /**
     * @var string
     */
    private $docId;
    /**
     * @var Product[]
     */
    private $products = [];

    public function getOriginalString(): string
    {
        return $this->originalString;
    }

    public function setOriginalString(string $originalString): self
    {
        $this->originalString = $originalString;

        return $this;
    }

    public function getRegDate(): string
    {
        return $this->regDate;
    }

    public function setRegDate(string $regDate): self
    {
        $this->regDate = $regDate;

        return $this;
    }

    public function getDocumentDescription(): DocumentDescription
    {
        return $this->documentDescription;
    }

    public function setDocumentDescription(DocumentDescription $documentDescription): self
    {
        $this->documentDescription = $documentDescription;

        return $this;
    }

    public function getDocType(): string
    {
        return $this->docType;
    }

    public function setDocType(string $docType): self
    {
        $this->docType = $docType;

        return $this;
    }

    public function getReceiver(): string
    {
        return $this->receiver;
    }

    public function setReceiver(string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getDocId(): string
    {
        return $this->docId;
    }

    public function setDocId(string $docId): self
    {
        $this->docId = $docId;

        return $this;
    }

    /**
     * @return Product[]
     */
    public function getProducts(): array
    {
        return $this->products;
    }

    public function addProduct(Product $product): self
    {
        $this->products[spl_object_hash($product)] = $product;

        return $this;
    }

    public function removeProduct(Product $product): self
    {
        unset($this->products[spl_object_hash($product)]);

        return $this;
    }

    public function hasProducts(Product $product): bool
    {
        return array_key_exists(spl_object_hash($product), $this->products);
    }
}
