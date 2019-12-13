<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class FacadeDocListV2Query
{
    public const DOCUMENT_STATUS_IN_PROGRESS = 'IN_PROGRESS';
    public const DOCUMENT_STATUS_CHECKED_OK = 'CHECKED_OK';
    public const DOCUMENT_STATUS_CHECKED_NOT_OK = 'CHECKED_NOT_OK';
    public const DOCUMENT_STATUS_PROCESSING_ERROR = 'PROCESSING_ERROR';
    public const DOCUMENT_STATUS_UNDEFINED = 'UNDEFINED';

    public const DOCUMENT_TYPE_LP_INTRODUCE_GOODS = 'LP_INTRODUCE_GOODS';
    public const DOCUMENT_TYPE_LP_INTRODUCE_GOODS_CSV = 'LP_INTRODUCE_GOODS_CSV';
    public const DOCUMENT_TYPE_LP_INTRODUCE_GOODS_XML = 'LP_INTRODUCE_GOODS_XML';
    public const DOCUMENT_TYPE_LP_SHIP_GOODS = 'LP_SHIP_GOODS';
    public const DOCUMENT_TYPE_LP_SHIP_GOODS_XML = 'LP_SHIP_GOODS_XML';
    public const DOCUMENT_TYPE_LP_ACCEPT_GOODS = 'LP_ACCEPT_GOODS';
    public const DOCUMENT_TYPE_LP_ACCEPT_GOODS_XML = 'LP_ACCEPT_GOODS_XML';

    public const ORDER_ASC = 'ASC';
    public const ORDER_DESC = 'DESC';

    public const ORDER_COLUMN_DOC_DATE = 'docDate';
    public const ORDER_COLUMN_RECEIVED_AT = 'receivedAt';

    public const PAGE_DIR_NEXT = 'NEXT';
    public const PAGE_DIR_PREV = 'PREV';

    /**
     * @var \DateTimeInterface | null
     */
    private $dateFrom;
    /**
     * @var \DateTimeInterface | null
     */
    private $dateTo;
    /**
     * @var string|null
     */
    private $number;
    /**
     * @var string|null
     */
    private $documentStatus;
    /**
     * @var string|null
     */
    private $documentType;
    /**
     * @var bool | null
     */
    private $inputFormat;
    /**
     * @var string|null
     */
    private $participantInn;
    /**
     * @var string|null
     */
    private $order;
    /**
     * @var string|null
     */
    private $did;
    /**
     * @var string|null
     */
    private $orderedColumnValue;
    /**
     * @var string|null
     */
    private $orderColumn;
    /**
     * @var string|null
     */
    private $pageDir;
    /**
     * @var int
     */
    private $limit = 10;

    public function getDateFrom(): ?\DateTimeInterface
    {
        return $this->dateFrom;
    }

    public function setDateFrom(?\DateTimeInterface $dateFrom): void
    {
        $this->dateFrom = $dateFrom;
    }

    public function getDateTo(): ?\DateTimeInterface
    {
        return $this->dateTo;
    }

    public function setDateTo(?\DateTimeInterface $dateTo): void
    {
        $this->dateTo = $dateTo;
    }

    public function getNumber(): ?string
    {
        return $this->number;
    }

    public function setNumber(?string $number): void
    {
        $this->number = $number;
    }

    public function getDocumentStatus(): ?string
    {
        return $this->documentStatus;
    }

    public function setDocumentStatus(?string $documentStatus): void
    {
        $this->documentStatus = $documentStatus;
    }

    public function getDocumentType(): ?string
    {
        return $this->documentType;
    }

    public function setDocumentType(?string $documentType): void
    {
        $this->documentType = $documentType;
    }

    public function getInputFormat(): ?bool
    {
        return $this->inputFormat;
    }

    public function setInputFormat(?bool $inputFormat): void
    {
        $this->inputFormat = $inputFormat;
    }

    public function getParticipantInn(): ?string
    {
        return $this->participantInn;
    }

    public function setParticipantInn(?string $participantInn): void
    {
        $this->participantInn = $participantInn;
    }

    public function getOrder(): ?string
    {
        return $this->order;
    }

    public function setOrder(?string $order): void
    {
        $this->order = $order;
    }

    public function getDid(): ?string
    {
        return $this->did;
    }

    public function setDid(?string $did): void
    {
        $this->did = $did;
    }

    public function getOrderedColumnValue(): ?string
    {
        return $this->orderedColumnValue;
    }

    public function setOrderedColumnValue(?string $orderedColumnValue): void
    {
        $this->orderedColumnValue = $orderedColumnValue;
    }

    public function getOrderColumn(): ?string
    {
        return $this->orderColumn;
    }

    public function setOrderColumn(?string $orderColumn): void
    {
        $this->orderColumn = $orderColumn;
    }

    public function getPageDir(): ?string
    {
        return $this->pageDir;
    }

    public function setPageDir(?string $pageDir): void
    {
        $this->pageDir = $pageDir;
    }

    public function getLimit(): int
    {
        return $this->limit;
    }

    public function setLimit(int $limit): void
    {
        $this->limit = $limit;
    }

    public function toQueryArray(): array
    {
        $query = [];

        self::appendIfNotNull($query, 'dateTo', $this->dateTo, static function (\DateTimeInterface $value) {
            return $value->format('Y-m-d\TH:i:s.000\Z');
        });
        self::appendIfNotNull($query, 'dateFrom', $this->dateFrom, static function (\DateTimeInterface $value) {
            return $value->format('Y-m-d\TH:i:s.000\Z');
        });
        self::appendIfNotNull($query, 'number', $this->number);
        self::appendIfNotNull($query, 'documentStatus', $this->documentStatus);
        self::appendIfNotNull($query, 'documentType', $this->documentType);
        self::appendIfNotNull($query, 'inputFormat', $this->inputFormat, static function (bool $value) {
            return $value ? 'true' : 'false';
        });
        self::appendIfNotNull($query, 'participantInn', $this->participantInn);
        self::appendIfNotNull($query, 'order', $this->order);
        self::appendIfNotNull($query, 'did', $this->did);
        self::appendIfNotNull($query, 'orderedColumnValue', $this->orderedColumnValue);
        self::appendIfNotNull($query, 'orderColumn', $this->orderColumn);
        self::appendIfNotNull($query, 'pageDir', $this->pageDir);
        self::appendIfNotNull($query, 'limit', $this->limit);

        return $query;
    }

    private static function appendIfNotNull(array &$query, string $name, $value, callable $formatter = null): void
    {
        if ($value !== null) {
            $query[$name] = $formatter ? $formatter($value) : $value;
        }
    }
}
