<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3;

use Lamoda\IsmpClient\V3\Dto\AuthCertKeyResponse;
use Lamoda\IsmpClient\V3\Dto\AuthCertRequest;
use Lamoda\IsmpClient\V3\Dto\AuthCertResponse;
use Lamoda\IsmpClient\V3\Dto\DocumentCreateRequest;
use Lamoda\IsmpClient\V3\Dto\FacadeCisListResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Query;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
use Lamoda\IsmpClient\V3\Dto\FacadeOrderDetailsResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeOrderRequest;
use Lamoda\IsmpClient\V3\Dto\FacadeOrderResponse;
use Lamoda\IsmpClient\V3\Dto\ProductInfoResponse;

interface IsmpApiInterface
{
    public function authCertKey(): AuthCertKeyResponse;

    public function authCert(AuthCertRequest $request): AuthCertResponse;

    public function facadeOrder(string $token, FacadeOrderRequest $request): FacadeOrderResponse;

    public function facadeOrderDetails(string $token, string $orderId): FacadeOrderDetailsResponse;

    public function facadeDocListV2(string $token, FacadeDocListV2Query $query): FacadeDocListV2Response;

    public function facadeDocBody(string $token, string $docId): FacadeDocBodyResponse;

    public function lkDocumentsCreate(string $token, DocumentCreateRequest $request): string;

    public function lkImportSend(string $token, DocumentCreateRequest $request): string;

    public function lkReceiptSend(string $token, DocumentCreateRequest $request): string;

    public function lkDocumentsShipmentCreate(string $token, DocumentCreateRequest $request): string;

    public function lkDocumentsAcceptanceCreate(string $token, DocumentCreateRequest $request): string;

    public function productInfo(string $token, array $gtins): ProductInfoResponse;

    public function facadeCisList(string $token, string $cis): FacadeCisListResponse;
}
