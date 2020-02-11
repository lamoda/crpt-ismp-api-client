<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Tests\Impl\Serializer;

use Lamoda\IsmpClient\Impl\Serializer\SymfonySerializerAdapterFactory;
use Lamoda\IsmpClient\Serializer\SerializerInterface;
use Lamoda\IsmpClient\V3\Dto\AuthCertRequest;
use Lamoda\IsmpClient\V3\Dto\AuthCertResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2ItemResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
use Lamoda\IsmpClient\V3\Dto\FacadeMarkedProductsCertDoc;
use Lamoda\IsmpClient\V3\Dto\FacadeMarkedProductsResponse;
use PHPUnit\Framework\TestCase;

final class SymfonySerializerAdapterTest extends TestCase
{
    /**
     * @var SerializerInterface
     */
    private $serializer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->serializer = SymfonySerializerAdapterFactory::create();
    }

    /**
     * @dataProvider dataDeserialize
     */
    public function testDeserialize(string $class, string $data, object $expected): void
    {
        $result = $this->serializer->deserialize($class, $data);

        $this->assertEquals($expected, $result);
    }

    public function dataDeserialize(): array
    {
        return [
            [
                AuthCertResponse::class,
                json_encode(
                    [
                        'token' => 'test_token',
                    ]
                ),
                new AuthCertResponse(
                    'test_token'
                ),
            ],
            [
                FacadeDocListV2Response::class,
                json_encode(
                    [
                        'total' => 25,
                        'results' => [
                            [
                                'number' => 'b917dfb0-523d-41e0-9e64-e8bf0052c5bd',
                                'docDate' => '2019-01-18T06:45:35.630Z',
                                'receivedAt' => '2019-01-19T06:45:35.630Z',
                                'type' => 'LP_INTRODUCE_GOODS',
                                'status' => 'CHECKED_OK',
                                'senderName' => 'test',
                            ],
                        ],
                    ]
                ),
                new FacadeDocListV2Response(
                    25,
                    [
                        new FacadeDocListV2ItemResponse(
                            'b917dfb0-523d-41e0-9e64-e8bf0052c5bd',
                            '2019-01-18T06:45:35.630Z',
                            '2019-01-19T06:45:35.630Z',
                            'LP_INTRODUCE_GOODS',
                            'CHECKED_OK',
                            'test'
                        ),
                    ]
                ),
            ],
            [
                FacadeMarkedProductsResponse::class,
                json_encode(
                    [
                        'cis' => 'eb852349-647f-468f-bb90-d26a4d975a88',
                        'gtin' => '04630034070029',
                        'tnVed' => '6401100000',
                        'productName' => 'Product name',
                        'ownerName' => 'Owner name',
                        'ownerInn' => '0000000000',
                        'producerName' => 'Producer name',
                        'producerInn' => '0000000000',
                        'status' => 'INTRODUCED',
                        'emissionDate' => '2019-01-18T08:14:40.344Z',
                        'emissionType' => 'LOCAL',
                        'statusExt' => 'WAIT_SHIPMENT',
                        'withdrawReason' => 'RETAIL',
                        'name' => 'Name',
                        'brand' => 'Brand',
                        'model' => 'Model',
                        'certDoc' => [
                            'type' => 'CONFORMITY_CERT',
                            'number' => '122',
                            'date' => '2019-01-02T20:00:00.000Z',
                        ],
                        'country' => 'РОССИЙСКАЯ ФЕДЕРАЦИЯ',
                        'productTypeDesc' => 'ТАПОЧКИ',
                        'color' => 'белый',
                        'materialDown' => 'Текстиль',
                        'productSize' => '52',
                        'materialUpper' => 'Текстиль',
                        'materialLining' => 'Текстиль',
                        'packageType' => 'BOX',
                        'productType' => '310000022',
                    ]
                ),
                new FacadeMarkedProductsResponse(
                    'eb852349-647f-468f-bb90-d26a4d975a88',
                    '04630034070029',
                    '6401100000',
                    'Product name',
                    'Owner name',
                    '0000000000',
                    'Producer name',
                    '0000000000',
                    'INTRODUCED',
                    '2019-01-18T08:14:40.344Z',
                    'LOCAL',
                    'WAIT_SHIPMENT',
                    'RETAIL',
                    'Name',
                    'Brand',
                    'Model',
                    new FacadeMarkedProductsCertDoc(
                        'CONFORMITY_CERT',
                        '122',
                        '2019-01-02T20:00:00.000Z'
                    ),
                    'РОССИЙСКАЯ ФЕДЕРАЦИЯ',
                    'ТАПОЧКИ',
                    'белый',
                    'Текстиль',
                    '52',
                    'Текстиль',
                    'Текстиль',
                    'BOX',
                    '310000022'
                )
            ],
        ];
    }

    /**
     * @dataProvider dataSerialize
     */
    public function testSerialize(object $data, string $expected): void
    {
        $result = $this->serializer->serialize($data);

        $this->assertJsonStringEqualsJsonString($expected, $result);
    }

    public function dataSerialize(): array
    {
        return [
            [
                new AuthCertRequest(
                    'uuid_value',
                    'data_value'
                ),
                <<<JSON
{
  "uuid": "uuid_value",
  "data": "data_value"
}
JSON
                ,
            ],
        ];
    }
}
