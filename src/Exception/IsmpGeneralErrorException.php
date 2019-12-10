<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Exception;

final class IsmpGeneralErrorException extends \RuntimeException implements IsmpClientExceptionInterface
{
    public static function becauseOfError(\Throwable $exception): self
    {
        return new static(sprintf(
            'Request to ISMP finished with error "%s"',
            $exception->getMessage()
        ), 0, $exception);
    }
}
