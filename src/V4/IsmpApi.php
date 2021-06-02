<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\V4;

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
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Query;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
use Lamoda\IsmpClient\V3\Dto\FacadeMarkedProductsResponse;
use Lamoda\IsmpClient\V3\Dto\ProductInfoResponse;
use Lamoda\IsmpClient\V3\IsmpApi as IsmpApiV3;
use Lamoda\IsmpClient\V3\IsmpApiInterface as IsmpApiV3Interface;
use Lamoda\IsmpClient\V4\Dto\FacadeCisListRequest;
use Lamoda\IsmpClient\V4\Dto\FacadeCisListResponse;
use Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse;

class IsmpApi implements IsmpApiInterface
{
    /**
     * @var ClientInterface
     */
    private $client;
    /**
     * @var SerializerInterface
     */
    private $serializer;
    /**
     * @var IsmpApiV3|IsmpApiV3Interface
     */
    private $ismpApiV3;

    public function __construct(ClientInterface $client, SerializerInterface $serializer, ?IsmpApiV3Interface $ismpApiV3 = null)
    {
        $this->client = $client;
        $this->serializer = $serializer;
        $this->ismpApiV3 = $ismpApiV3 ?? new IsmpApiV3($client, $serializer);
    }

    public function facadeDocBody(string $token, string $docId, ?int $limit = null, ?string $orderColumn = null, ?string $orderedColumnValue = null, ?string $pageDir = null): FacadeDocBodyResponse
    {
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

        $result = $this->request('GET', sprintf('/api/v4/facade/doc/%s/body', $docId), null, $query, $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeDocBodyResponse::class, $result);
    }

    public function facadeCisList(string $token, FacadeCisListRequest $request): FacadeCisListResponse
    {
        $body = $this->serializer->serialize($request);
        $response = $this->request('POST', '/api/v4/facade/cis/cis_list', $body, null, $token);

        /* @noinspection PhpIncompatibleReturnTypeInspection */
        return $this->serializer->deserialize(FacadeCisListResponse::class, $response);
    }

    public function authCertKey(): AuthCertKeyResponse
    {
        return $this->ismpApiV3->authCertKey();
    }

    public function authCert(AuthCertRequest $request, ?string $connection = null): AuthCertResponse
    {
        return $this->ismpApiV3->authCert($request, $connection);
    }

    public function facadeDocListV2(string $token, FacadeDocListV2Query $query): FacadeDocListV2Response
    {
        return $this->ismpApiV3->facadeDocListV2($token, $query);
    }

    public function lkDocumentsCreate(string $token, DocumentCreateRequest $request): string
    {
        return $this->ismpApiV3->lkDocumentsCreate($token, $request);
    }

    public function productInfo(string $token, array $gtins): ProductInfoResponse
    {
        return $this->ismpApiV3->productInfo($token, $gtins);
    }

    public function facadeMarkedProducts(string $token, string $cis): FacadeMarkedProductsResponse
    {
        return $this->ismpApiV3->facadeMarkedProducts($token, $cis);
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
