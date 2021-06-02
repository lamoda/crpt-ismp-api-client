<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4\Dto;

final class FacadeCisListRequest
{
    /** @var string[] */
    private $cises;

    public function __construct(string ...$cises)
    {
        $this->cises = $cises;
    }

    /**
     * @return string[]
     */
    public function getCises(): array
    {
        return $this->cises;
    }
}
