<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse;

use Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse\Body\DocumentDescription;
use Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse\Body\Products\Product;

class Body
{
    /**
     * @var string|null
     */
    private $originalString;
    /**
     * @var string|null
     */
    private $regDate;
    /**
     * @var DocumentDescription|null
     */
    private $documentDescription;
    /**
     * @var string|null
     */
    private $docType;
    /**
     * @var string|null
     */
    private $receiver;
    /**
     * @var string|null
     */
    private $docId;
    /**
     * @var Product[]
     */
    private $products = [];
    /**
     * @var Product[]
     */
    private $productsList = [];
    /**
     * @var string|null
     */
    private $turnoverType;
    /**
     * @var string|null
     */
    private $documentNum;
    /**
     * @var string|null
     */
    private $documentDate;
    /**
     * @var string|null
     */
    private $sale;
    /**
     * @var string|null
     */
    private $withdrawalFromTurnover;
    /**
     * @var string|null
     */
    private $transferDate;
    /**
     * @var string|null
     */
    private $receiverInn;
    /**
     * @var string|null
     */
    private $ownerInn;

    public function getOriginalString(): ?string
    {
        return $this->originalString;
    }

    public function setOriginalString(?string $originalString): self
    {
        $this->originalString = $originalString;

        return $this;
    }

    public function getRegDate(): ?string
    {
        return $this->regDate;
    }

    public function setRegDate(?string $regDate): self
    {
        $this->regDate = $regDate;

        return $this;
    }

    public function getDocumentDescription(): ?DocumentDescription
    {
        return $this->documentDescription;
    }

    public function setDocumentDescription(?DocumentDescription $documentDescription): self
    {
        $this->documentDescription = $documentDescription;

        return $this;
    }

    public function getDocType(): ?string
    {
        return $this->docType;
    }

    public function setDocType(?string $docType): self
    {
        $this->docType = $docType;

        return $this;
    }

    public function getReceiver(): ?string
    {
        return $this->receiver;
    }

    public function setReceiver(?string $receiver): self
    {
        $this->receiver = $receiver;

        return $this;
    }

    public function getDocId(): ?string
    {
        return $this->docId;
    }

    public function setDocId(?string $docId): self
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

    public function setProducts(array $products): self
    {
        $this->products = $products;

        return $this;
    }

    public function getProductsList(): array
    {
        return $this->productsList;
    }

    public function setProductsList(array $productsList): self
    {
        $this->productsList = $productsList;

        return $this;
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

    public function getTurnoverType(): ?string
    {
        return $this->turnoverType;
    }

    public function setTurnoverType(?string $turnoverType): self
    {
        $this->turnoverType = $turnoverType;

        return $this;
    }

    public function getDocumentNum(): ?string
    {
        return $this->documentNum;
    }

    public function setDocumentNum(?string $documentNum): self
    {
        $this->documentNum = $documentNum;

        return $this;
    }

    public function getDocumentDate(): ?string
    {
        return $this->documentDate;
    }

    public function setDocumentDate(?string $documentDate): self
    {
        $this->documentDate = $documentDate;

        return $this;
    }

    public function getSale(): ?string
    {
        return $this->sale;
    }

    public function setSale(?string $sale): self
    {
        $this->sale = $sale;

        return $this;
    }

    public function getWithdrawalFromTurnover(): ?string
    {
        return $this->withdrawalFromTurnover;
    }

    public function setWithdrawalFromTurnover(?string $withdrawalFromTurnover): self
    {
        $this->withdrawalFromTurnover = $withdrawalFromTurnover;

        return $this;
    }

    public function getTransferDate(): ?string
    {
        return $this->transferDate;
    }

    public function setTransferDate(?string $transferDate): self
    {
        $this->transferDate = $transferDate;

        return $this;
    }

    public function getReceiverInn(): ?string
    {
        return $this->receiverInn;
    }

    public function setReceiverInn(?string $receiverInn): self
    {
        $this->receiverInn = $receiverInn;

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
