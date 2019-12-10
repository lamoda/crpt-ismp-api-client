<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Exception;

final class IsmpRequestErrorException extends \RuntimeException implements IsmpClientExceptionInterface
{
    /**
     * @var string
     */
    private $response;
    /**
     * @var int
     */
    private $responseCode;

    public static function becauseOfErrorResponse(int $responseCode, string $response, \Throwable $exception): self
    {
        $self = new static(sprintf(
            'Request to ISMP finished with error response and message "%s"',
            $exception->getMessage()
        ), 0, $exception);

        $self->responseCode = $responseCode;
        $self->response = $response;

        return $self;
    }

    public function getResponse(): string
    {
        return $this->response;
    }

    public function getResponseCode(): int
    {
        return $this->responseCode;
    }
}
