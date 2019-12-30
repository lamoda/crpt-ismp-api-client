<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

use Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse\Body;
use Symfony\Component\Serializer\Annotation\SerializedName;

final class FacadeDocBodyResponse
{
    public const STATUS_IN_PROGRESS = 'IN_PROGRESS';
    public const STATUS_CHECKED_NOT_OK = 'CHECKED_NOT_OK';
    public const STATUS_PROCESSING_ERROR = 'PROCESSING_ERROR';
    public const STATUS_CHECKED_OK = 'CHECKED_OK';
    public const STATUS_UNDEFINED = 'UNDEFINED';
    public const STATUS_CANCELLED = 'CANCELLED';
    public const STATUS_ACCEPTED = 'ACCEPTED';
    public const STATUS_WAIT_ACCEPTANCE = 'WAIT_ACCEPTANCE';
    public const STATUS_WAIT_PARTICIPANT_REGISTRATION = 'WAIT_PARTICIPANT_REGISTRATION';

    /**
     * @var string
     */
    private $number;
    /**
     * @var string
     *
     * @SerializedName("docDate")
     */
    private $docDate;
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $status;
    /**
     * @var string
     *
     * @SerializedName("senderName")
     */
    private $senderName;
    /**
     * @var string
     */
    private $content;
    /**
     * @var Body|null
     */
    private $body;
    /**
     * @var array|null
     */
    private $errors;

    public function __construct(
        string $number,
        string $docDate,
        string $type,
        string $status,
        string $senderName,
        string $content,
        ?Body $body = null
    ) {
        $this->number = $number;
        $this->docDate = $docDate;
        $this->type = $type;
        $this->status = $status;
        $this->senderName = $senderName;
        $this->content = $content;
        $this->body = $body;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getDocDate(): string
    {
        return $this->docDate;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getSenderName(): string
    {
        return $this->senderName;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function getBody(): ?Body
    {
        return $this->body;
    }

    public function getErrors(): ?array
    {
        return $this->errors;
    }

    public function setErrors(?array $errors)
    {
        $this->errors = $errors;
    }
}
