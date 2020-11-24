<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V3;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\RequestOptions;
use Lamoda\IsmpClient\Exception\IsmpGeneralErrorException;
use Lamoda\IsmpClient\Exception\IsmpRequestErrorException;
use Lamoda\IsmpClient\Serializer\SerializerInterface;
use Lamoda\IsmpClient\V3\Dto\AuthCertKeyResponse;
use Lamoda\IsmpClient\V3\Dto\AuthCertRequest;
use Lamoda\IsmpClient\V3\Dto\AuthCertResponse;
use Lamoda\IsmpClient\V3\Dto\DocumentCreateRequest;
use Lamoda\IsmpClient\V3\Dto\FacadeCisListRequest;
use Lamoda\IsmpClient\V3\Dto\FacadeCisListResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Query;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
use Lamoda\IsmpClient\V3\Dto\FacadeMarkedProductsResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeOrderDetailsResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeOrderRequest;
use Lamoda\IsmpClient\V3\Dto\FacadeOrderResponse;
use Lamoda\IsmpClient\V3\Dto\ProductInfoResponse;

final class IsmpApi implements IsmpApiInterface
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var SerializerInterface
     */
    private $serializer;

    public function __construct(ClientInterface $client, SerializerInterface $serializer)
    {
        $this->client = $client;
        $this->serializer = $serializer;
    }

    public function authCertKey(): AuthCertKeyResponse
    {
        $result = $this->request('GET', '/api/v3/auth/cert/key');

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(AuthCertKeyResponse::class, $result);
    }

    public function authCert(AuthCertRequest $request): AuthCertResponse
    {
        $body = $this->serializer->serialize($request);
        $result = $this->request('POST', '/api/v3/auth/cert/', $body);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(AuthCertResponse::class, $result);
    }

    public function facadeOrder(string $token, FacadeOrderRequest $request): FacadeOrderResponse
    {
        $body = $this->serializer->serialize($request);
        $result = $this->request('POST', '/api/v3/facade/order/', $body, null, $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeOrderResponse::class, $result);
    }

    public function facadeOrderDetails(string $token, string $orderId): FacadeOrderDetailsResponse
    {
        $result = $this->request('GET', sprintf('/api/v3/facade/order/%s/details', $orderId), null, null, $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeOrderDetailsResponse::class, $result);
    }

    public function facadeDocListV2(string $token, FacadeDocListV2Query $query): FacadeDocListV2Response
    {
        $result = $this->request('GET', '/api/v3/facade/doc/listV2', null, $query->toQueryArray(), $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeDocListV2Response::class, $result);
    }

    public function facadeDocBody(
        string $token,
        string $docId,
        ?int $limit = null,
        ?string $orderColumn = null,
        ?string $orderedColumnValue = null,
        ?string $pageDir = null
    ): FacadeDocBodyResponse {
        $query = null;
        if ($limit !== null) {
            $query['limit'] = $limit;
        }
        if ($orderColumn !== null) {
            $query['orderColumn'] = $orderColumn;
        }
        if ($orderedColumnValue !== null) {
            $query['orderedColumnValue'] = $orderedColumnValue;
        }
        if ($pageDir !== null) {
            $query['pageDir'] = $pageDir;
        }

        $result = $this->request('GET', sprintf('/api/v3/facade/doc/%s/body', $docId), null, $query, $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeDocBodyResponse::class, $result);
    }

    public function facadeCisList(string $token, FacadeCisListRequest $request): FacadeCisListResponse
    {
        $body = $this->serializer->serialize($request);
        $response = $this->request('POST', '/api/v3/facade/cis/cis_list', $body, null, $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeCisListResponse::class, $response);
    }

    public function facadeMarkedProducts(string $token, string $cis): FacadeMarkedProductsResponse
    {
        $response = $this->request('GET', '/api/v3/facade/marked_products/info', null, ['cis' => $cis], $token);

        /** @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeMarkedProductsResponse::class, $response);
    }

    public function lkDocumentsCreate(string $token, DocumentCreateRequest $request): string
    {
        assert($request->getType() !== null, 'Document type is required for lkDocumentsCreate');
        assert($request->getProductGroup() !== null, 'Product group is required for lkDocumentsCreate');

        $body = $this->serializer->serialize($request);

        return $this->request(
            'POST',
            '/api/v3/lk/documents/create',
            $body,
            ['pg' => $request->getProductGroup()],
            $token
        );
    }

    public function lkImportSend(string $token, DocumentCreateRequest $request): string
    {
        $body = $this->serializer->serialize($request);

        return $this->request('POST', '/api/v3/lk/import/send', $body, null, $token);
    }

    public function lkReceiptSend(string $token, DocumentCreateRequest $request): string
    {
        $body = $this->serializer->serialize($request);

        return $this->request('POST', '/api/v3/lk/receipt/send', $body, null, $token);
    }

    public function lkDocumentsShipmentCreate(string $token, DocumentCreateRequest $request): string
    {
        $body = $this->serializer->serialize($request);

        return $this->request('POST', '/api/v3/lk/documents/shipment/create', $body, null, $token);
    }

    public function lkDocumentsAcceptanceCreate(string $token, DocumentCreateRequest $request): string
    {
        $body = $this->serializer->serialize($request);

        return $this->request('POST', '/api/v3/lk/documents/acceptance/create', $body, null, $token);
    }

    public function productInfo(string $token, array $gtins): ProductInfoResponse
    {
        $gtinsList = implode(',', $gtins);

        $result = $this->request('GET', 'api/v3/product/info', null, [
            'gtins' => $gtinsList,
        ], $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(ProductInfoResponse::class, $result);
    }

    private function request(string $method, string $uri, $body = null, $query = null, string $token = null): string
    {
        $options = [
            RequestOptions::BODY => $body,
            RequestOptions::HEADERS => [
                'Content-Type' => 'application/json',
            ],
            RequestOptions::HTTP_ERRORS => true,
            RequestOptions::QUERY => $query,
        ];

        if ($token) {
            $options[RequestOptions::HEADERS]['Authorization'] = 'Bearer ' . $token;
        }

        $uri = ltrim($uri, '/');

        try {
            $result = $this->client->request($method, $uri, $options);
        } catch (\Throwable $exception) {
            /* @noinspection PhpUnhandledExceptionInspection */
            throw $this->handleRequestException($exception);
        }

        return (string)$result->getBody();
    }

    private function handleRequestException(\Throwable $exception): \Throwable
    {
        if ($exception instanceof BadResponseException) {
            $response = $exception->getResponse();
            $responseBody = $response ? (string)$response->getBody() : '';
            $responseCode = $response ? $response->getStatusCode() : 0;

            return IsmpRequestErrorException::becauseOfErrorResponse($responseCode, $responseBody, $exception);
        }

        return IsmpGeneralErrorException::becauseOfError($exception);
    }
}
