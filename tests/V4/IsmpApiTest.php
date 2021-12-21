<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Tests\V4;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\RequestOptions;
use Lamoda\IsmpClient\Exception\IsmpGeneralErrorException;
use Lamoda\IsmpClient\Exception\IsmpRequestErrorException;
use Lamoda\IsmpClient\Serializer\SerializerInterface;
use Lamoda\IsmpClient\V3\Dto\AuthCertKeyResponse;
use Lamoda\IsmpClient\V3\Dto\AuthCertRequest;
use Lamoda\IsmpClient\V3\Dto\AuthCertResponse;
use Lamoda\IsmpClient\V3\Dto\DocumentCreateRequest;
use Lamoda\IsmpClient\V4\Dto\FacadeCisListRequest;
use Lamoda\IsmpClient\V4\Dto\FacadeCisListResponse;
use Lamoda\IsmpClient\V4\Dto\FacadeDocBodyResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Query;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
use Lamoda\IsmpClient\V3\Dto\ProductInfoResponse;
use Lamoda\IsmpClient\V3\Enum\DocumentLkType;
use Lamoda\IsmpClient\V3\Enum\ProductGroup;
use Lamoda\IsmpClient\V4\IsmpApi;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;

use function GuzzleHttp\Psr7\stream_for;

final class IsmpApiTest extends TestCase
{
    private const TOKEN = '0a893bdc-3127-4f3f-939e-f423d08d9bd6';
    private const UUID = '81497c0c-17ef-42a1-b1d1-d769dac7441c';
    private const RANDOM_DATA = '2b212c99-9955-45c7-8594-9d3aa59eae04';
    private const SERIALIZED_VALUE = '{"test:"value"}';
    private const API_RESPONSE = 'stub_api_response';
    private const IDENTITY = 'eb852349-647f-468f-bb90-d26a4d975a88';

    /**
     * @var ClientInterface|MockObject
     */
    private $client;
    /**
     * @var SerializerInterface|MockObject
     */
    private $serializer;
    /**
     * @var IsmpApi
     */
    private $api;

    protected function setUp(): void
    {
        $this->client = $this->createMock(ClientInterface::class);
        $this->serializer = $this->createMock(SerializerInterface::class);

        $this->api = new IsmpApi(
            $this->client,
            $this->serializer
        );
    }

    public function testExceptionWithHttpCode(): void
    {
        $this->client
            ->method('request')
            ->willThrowException(new BadResponseException('Bad response', $this->createMock(RequestInterface::class)));

        $this->expectException(IsmpRequestErrorException::class);
        $this->api->authCertKey();
    }

    public function testGeneralException(): void
    {
        $this->client
            ->method('request')
            ->willThrowException(new \RuntimeException());

        $this->expectException(IsmpGeneralErrorException::class);
        $this->api->authCertKey();
    }

    public function testAuthCertKey(): void
    {
        $expectedResult = new AuthCertKeyResponse(self::UUID, self::RANDOM_DATA);

        $this->serializer
            ->method('deserialize')
            ->with(
                get_class($expectedResult),
                self::API_RESPONSE
            )
            ->willReturn($expectedResult);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                'api/v3/auth/cert/key',
                [
                    RequestOptions::BODY => null,
                    RequestOptions::HEADERS => [
                        'Content-Type' => 'application/json',
                    ],
                    RequestOptions::HTTP_ERRORS => true,
                    RequestOptions::QUERY => null,
                ]
            )
            ->willReturn(
                (new Response())
                    ->withBody(stream_for(self::API_RESPONSE))
            );

        $result = $this->api->authCertKey();

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider provideTestAuthCertData
     * @param AuthCertRequest $request
     * @param string|null $connection
     * @param AuthCertResponse $expectedResult
     */
    public function testAuthCert(
        AuthCertRequest $request,
        ?string $connection,
        AuthCertResponse $expectedResult
    ): void {
        $this->serializer
            ->method('serialize')
            ->with($request)
            ->willReturn(self::SERIALIZED_VALUE);

        $this->serializer
            ->method('deserialize')
            ->with(
                get_class($expectedResult),
                self::API_RESPONSE
            )
            ->willReturn($expectedResult);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                sprintf('api/v3/auth/cert/%s', $connection),
                [
                    RequestOptions::BODY => self::SERIALIZED_VALUE,
                    RequestOptions::HEADERS => [
                        'Content-Type' => 'application/json',
                    ],
                    RequestOptions::HTTP_ERRORS => true,
                    RequestOptions::QUERY => null,
                ]
            )
            ->willReturn(
                (new Response())
                    ->withBody(stream_for(self::API_RESPONSE))
            );

        $result = $this->api->authCert($request, $connection);

        $this->assertEquals($expectedResult, $result);
    }

    public function provideTestAuthCertData(): iterable
    {
        yield 'Without connection' => [
            $request = new AuthCertRequest(self::UUID, self::RANDOM_DATA),
            null,
            $response = new AuthCertResponse('token-value')
        ];

        yield 'With connection' => [
            $request,
            'connection',
            $response
        ];
    }

    public function testFacadeDocListV2(): void
    {
        $query = new FacadeDocListV2Query();
        $query->setDocumentStatus(FacadeDocListV2Query::DOCUMENT_STATUS_CHECKED_OK);
        $query->setDateFrom(new \DateTimeImmutable('2019-01-01 11:12:13', new \DateTimeZone('UTC')));
        $expectedResult = new FacadeDocListV2Response(0);

        $this->serializer
            ->method('deserialize')
            ->with(
                get_class($expectedResult),
                self::API_RESPONSE
            )
            ->willReturn($expectedResult);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                'api/v3/facade/doc/listV2',
                [
                    RequestOptions::BODY => null,
                    RequestOptions::HEADERS => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . self::TOKEN,
                    ],
                    RequestOptions::HTTP_ERRORS => true,
                    RequestOptions::QUERY => [
                        'documentStatus' => FacadeDocListV2Query::DOCUMENT_STATUS_CHECKED_OK,
                        'dateFrom' => '2019-01-01T11:12:13.000Z',
                        'limit' => $query->getLimit(),
                    ],
                ]
            )
            ->willReturn(
                (new Response())
                    ->withBody(stream_for(self::API_RESPONSE))
            );

        $result = $this->api->facadeDocListV2(self::TOKEN, $query);

        $this->assertEquals($expectedResult, $result);
    }

    /**
     * @dataProvider provideTestFacadeDocBodyData
     */
    public function testFacadeDocBody(
        ?int $limitOption,
        ?string $orderColumnOption,
        ?string $orderedColumnValueOption,
        ?string $pageDirOption,
        array $expectedOptions
    ): void {
        $expectedResult = new FacadeDocBodyResponse(self::IDENTITY, '2019-01-01', 'IMPORT', 'NEW', 'Tester', 'Test');
        $expectedResult->setCisTotal('100');

        $this->serializer
            ->method('deserialize')
            ->with(
                get_class($expectedResult),
                self::API_RESPONSE
            )
            ->willReturn($expectedResult);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                sprintf('api/v4/facade/doc/%s/body', self::IDENTITY),
                $expectedOptions
            )
            ->willReturn(
                (new Response())
                    ->withBody(stream_for(self::API_RESPONSE))
            );

        $result = $this->api->facadeDocBody(
            self::TOKEN,
            self::IDENTITY,
            $limitOption,
            $orderColumnOption,
            $orderedColumnValueOption,
            $pageDirOption
        );

        $this->assertEquals($expectedResult, $result);
    }

    public function provideTestFacadeDocBodyData(): iterable
    {
        yield 'all nullable parameters' => [
            null,
            null,
            null,
            null,
            [
                RequestOptions::BODY => null,
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::TOKEN,
                ],
                RequestOptions::HTTP_ERRORS => true,
                RequestOptions::QUERY => null,
            ],
        ];

        yield 'only limit' => [
            1000,
            null,
            null,
            null,
            [
                RequestOptions::BODY => null,
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::TOKEN,
                ],
                RequestOptions::HTTP_ERRORS => true,
                RequestOptions::QUERY => [
                    'limit' => 1000,
                ],
            ],
        ];

        yield 'only order column option' => [
            null,
            'order-column',
            null,
            null,
            [
                RequestOptions::BODY => null,
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::TOKEN,
                ],
                RequestOptions::HTTP_ERRORS => true,
                RequestOptions::QUERY => [
                    'orderColumn' => 'order-column',
                ],
            ],
        ];

        yield 'only ordered column value option' => [
            null,
            null,
            'ordered-column-value',
            null,
            [
                RequestOptions::BODY => null,
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::TOKEN,
                ],
                RequestOptions::HTTP_ERRORS => true,
                RequestOptions::QUERY => [
                    'orderedColumnValue' => 'ordered-column-value',
                ],
            ],
        ];

        yield 'only page dir option' => [
            null,
            null,
            null,
            'page-dir',
            [
                RequestOptions::BODY => null,
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::TOKEN,
                ],
                RequestOptions::HTTP_ERRORS => true,
                RequestOptions::QUERY => [
                    'pageDir' => 'page-dir'
                ],
            ],
        ];


        yield 'all parameters' => [
            1000,
            'order-column',
            'ordered-column-value',
            'page-dir',
            [
                RequestOptions::BODY => null,
                RequestOptions::HEADERS => [
                    'Content-Type' => 'application/json',
                    'Authorization' => 'Bearer ' . self::TOKEN,
                ],
                RequestOptions::HTTP_ERRORS => true,
                RequestOptions::QUERY => [
                    'limit' => 1000,
                    'orderColumn' => 'order-column',
                    'orderedColumnValue' => 'ordered-column-value',
                    'pageDir' => 'page-dir',
                ],
            ],
        ];
    }

    public function testFacadeCisList(): void
    {
        $request = new FacadeCisListRequest(self::IDENTITY);
        $expectedResult = new FacadeCisListResponse();
        $requestBody = '{"cises": [' . self::IDENTITY . ']}';

        $this->serializer
            ->method('serialize')
            ->with($request)
            ->willReturn($requestBody);

        $this->serializer
            ->method('deserialize')
            ->with(
                get_class($expectedResult),
                self::API_RESPONSE
            )
            ->willReturn($expectedResult);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                'api/v4/facade/cis/cis_list',
                [
                    RequestOptions::BODY => $requestBody,
                    RequestOptions::HEADERS => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . self::TOKEN,
                    ],
                    RequestOptions::HTTP_ERRORS => true,
                    RequestOptions::QUERY => null,
                ]
            )
            ->willReturn(
                (new Response())
                    ->withBody(stream_for(self::API_RESPONSE))
            );

        $result = $this->api->facadeCisList(self::TOKEN, $request);

        $this->assertEquals($expectedResult, $result);
    }

    public function testLkDocumentsCreate(): void
    {
        $request = new DocumentCreateRequest(
            'document',
            'MANUAL',
            'signature',
            ProductGroup::SHOES,
            DocumentLkType::LP_INTRODUCE_GOODS
        );

        $this->serializer
            ->method('serialize')
            ->with($request)
            ->willReturn(self::SERIALIZED_VALUE);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                'POST',
                'api/v3/lk/documents/create',
                [
                    RequestOptions::BODY => self::SERIALIZED_VALUE,
                    RequestOptions::HEADERS => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . self::TOKEN,
                    ],
                    RequestOptions::HTTP_ERRORS => true,
                    RequestOptions::QUERY => ['pg' => ProductGroup::SHOES],
                ]
            )
            ->willReturn(
                (new Response())
                    ->withBody(stream_for(self::API_RESPONSE))
            );

        $result = $this->api->lkDocumentsCreate(self::TOKEN, $request);

        $this->assertEquals(self::API_RESPONSE, $result);
    }

    public function testProductInfo(): void
    {
        $request = ['aaa', 'bbb'];
        $expectedResult = new ProductInfoResponse([], 0);

        $this->serializer
            ->method('deserialize')
            ->with(
                get_class($expectedResult),
                self::API_RESPONSE
            )
            ->willReturn($expectedResult);

        $this->client->expects($this->once())
            ->method('request')
            ->with(
                'GET',
                'api/v3/product/info',
                [
                    RequestOptions::BODY => null,
                    RequestOptions::HEADERS => [
                        'Content-Type' => 'application/json',
                        'Authorization' => 'Bearer ' . self::TOKEN,
                    ],
                    RequestOptions::HTTP_ERRORS => true,
                    RequestOptions::QUERY => [
                        'gtins' => implode(',', $request),
                    ],
                ]
            )
            ->willReturn(
                (new Response())
                    ->withBody(stream_for(self::API_RESPONSE))
            );

        $result = $this->api->productInfo(self::TOKEN, $request);

        $this->assertEquals($expectedResult, $result);
    }
}
