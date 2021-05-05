<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4;

use Lamoda\IsmpClient\V3\Dto\AuthCertKeyResponse;
use Lamoda\IsmpClient\V3\Dto\AuthCertRequest;
use Lamoda\IsmpClient\V3\Dto\AuthCertResponse;
use Lamoda\IsmpClient\V3\Dto\DocumentCreateRequest;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Query;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
use Lamoda\IsmpClient\V3\Dto\FacadeMarkedProductsResponse;
use Lamoda\IsmpClient\V3\Dto\ProductInfoResponse;
use Lamoda\IsmpClient\V4\Dto\FacadeCisListRequest;
use Lamoda\IsmpClient\V4\Dto\FacadeCisListResponse;
use Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse;

interface IsmpApiInterface
{
    public function authCertKey(): AuthCertKeyResponse;

    public function authCert(AuthCertRequest $request, ?string $connection = null): AuthCertResponse;

    public function facadeDocListV2(string $token, FacadeDocListV2Query $query): FacadeDocListV2Response;

    public function facadeDocBody(string $token,
                                  string $docId,
                                  ?int $limit = null,
                                  ?string $orderColumn = null,
                                  ?string $orderedColumnValue = null,
                                  ?string $pageDir = null
    ): FacadeDocBodyResponse;

    public function lkDocumentsCreate(string $token, DocumentCreateRequest $request): string;

    public function productInfo(string $token, array $gtins): ProductInfoResponse;

    public function facadeCisList(string $token, FacadeCisListRequest $request): FacadeCisListResponse;

    public function facadeMarkedProducts(string $token, string $cis): FacadeMarkedProductsResponse;
}
