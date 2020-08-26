<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class FacadeMarkedProductsCertDoc
{
    /**
     * @var string
     */
    private $type;
    /**
     * @var string
     */
    private $number;
    /**
     * @var string
     */
    private $date;

    public function __construct(string $type, string $number, string $date)
    {
        $this->type = $type;
        $this->number = $number;
        $this->date = $date;
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getNumber(): string
    {
        return $this->number;
    }

    public function getDate(): string
    {
        return $this->date;
    }
}
