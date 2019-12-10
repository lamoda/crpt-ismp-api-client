<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3\Dto;

final class AuthCertResponse
{
    /**
     * @var string
     */
    private $token;

    /**
     * * @param string $token
     */
    public function __construct(string $token)
    {
        $this->token = $token;
    }

    public function getToken(): string
    {
        return $this->token;
    }
}
