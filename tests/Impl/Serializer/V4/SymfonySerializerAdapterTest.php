<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Tests\Impl\Serializer\V4;

use Lamoda\IsmpClient\Exception\IsmpSerializerErrorException;
use Lamoda\IsmpClient\Impl\Serializer\SymfonySerializerAdapterFactory;
use Lamoda\IsmpClient\Serializer\SerializerInterface;
use Lamoda\IsmpClient\V3\Dto\AuthCertRequest;
use Lamoda\IsmpClient\V3\Dto\AuthCertResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2ItemResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
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
                        (new FacadeDocListV2ItemResponse(
                            'b917dfb0-523d-41e0-9e64-e8bf0052c5bd',
                            '2019-01-18T06:45:35.630Z',
                            '2019-01-19T06:45:35.630Z'
                        ))->setType('LP_INTRODUCE_GOODS')
                        ->setStatus('CHECKED_OK')
                        ->setSenderName('test')
                    ]
                ),
            ],
            'agent item' => [
                FacadeMarkedProductsResponse::class,
                json_encode(
                    [
                        'cis' => '010290000021360921&XjcbJ.KYB+pT',
                        'gtin' => '02900000213609',
                        'sgtin' => '&XjcbJ.KYB+pT',
                        'producerName' => 'ООО "ОБУВЬОПТ"',
                        'producerInn' => '7731362094',
                        'ownerName' => 'ООО "ОБУВЬОПТ"',
                        'ownerInn' => '7731362094',
                        'agentName' => 'ООО "Купишуз"',
                        'agentInn' => '7705935687',
                        'emissionDate' => '2020-01-21T13:04:54.416Z',
                        'introducedDate' => '2020-01-31T18:11:15.139Z',
                        'emissionType' => 'REMAINS',
                        'lastDocId' => '6e71f305-1ee4-4f1c-92ab-4a69f5bb7bf8',
                        'prevCises' => [],
                        'nextCises' => [],
                        'status' => 'INTRODUCED',
                        'countChildren' => 0,
                        'packType' => 'UNIT'
                    ]
                ),
                (new FacadeMarkedProductsResponse(
                    '010290000021360921&XjcbJ.KYB+pT',
                    '02900000213609',
                    '&XjcbJ.KYB+pT',
                    'ООО "ОБУВЬОПТ"',
                    '7731362094',
                    'INTRODUCED',
                    '2020-01-21T13:04:54.416Z',
                    'REMAINS',
                    [],
                    [],
                    'UNIT',
                    0
                ))
                    ->setOwnerInn('7731362094')
                    ->setOwnerName('ООО "ОБУВЬОПТ"')
                    ->setAgentName('ООО "Купишуз"')
                    ->setAgentInn('7705935687')
                    ->setLastDocId('6e71f305-1ee4-4f1c-92ab-4a69f5bb7bf8')
                    ->setIntroducedDate('2020-01-31T18:11:15.139Z')
            ],
            [
                FacadeMarkedProductsResponse::class,
                json_encode(
                    [
                        'cis' => "010463007034375021UptR1qHZW6\"B'",
                        'gtin' => '04630070343750',
                        'sgtin' => "UptR1qHZW6\"B'",
                        'productName' => 'Жен Полуботинки кроссовые типа кеды 005 модель CF2612 размер производителя 38 EUR, российский 37 код в учетной системе CH057AWHPGH0E380',
                        'producerName' => 'ООО "Купишуз"',
                        'producerInn' => '7705935687',
                        'ownerName' => 'ООО "Купишуз"',
                        'ownerInn' => '7705935687',
                        'emissionDate' => '2020-02-17T07:48:13.797Z',
                        'emissionType' => 'FOREIGN',
                        'name' => 'Жен Полуботинки кроссовые типа кеды 005 модель CF2612 размер производителя 38 EUR, российский 37 код в учетной системе CH057AWHPGH0E380',
                        'brand' => 'Chiara Ferragni Collection',
                        'model' => 'CF2612',
                        'prevCises' => [],
                        'nextCises' => [],
                        'status' => 'APPLIED',
                        'countChildren' => 0,
                        'packType' => 'UNIT',
                        'country' => 'ИТАЛИЯ',
                        'productTypeDesc' => 'КЕДЫ',
                        'color' => '005',
                        'materialDown' => '100 - резина',
                        'materialUpper' => '100 - натуральная кожа',
                        'goodSignedFlag' => 'true',
                        'materialLining' => '100 - натуральная кожа',
                        'goodTurnFlag' => 'true',
                        'goodMarkFlag' => 'true'
                    ]
                ),
                (new FacadeMarkedProductsResponse(
                    "010463007034375021UptR1qHZW6\"B'",
                    '04630070343750',
                    "UptR1qHZW6\"B'",
                    'ООО "Купишуз"',
                    '7705935687',
                    'APPLIED',
                    '2020-02-17T07:48:13.797Z',
                    'FOREIGN',
                    [],
                    [],
                    'UNIT',
                    0
                ))
                    ->setOwnerInn('7705935687')
                    ->setOwnerName('ООО "Купишуз"')
                    ->setProductName('Жен Полуботинки кроссовые типа кеды 005 модель CF2612 размер производителя 38 EUR, российский 37 код в учетной системе CH057AWHPGH0E380')
                    ->setName('Жен Полуботинки кроссовые типа кеды 005 модель CF2612 размер производителя 38 EUR, российский 37 код в учетной системе CH057AWHPGH0E380')
                    ->setBrand('Chiara Ferragni Collection')
                    ->setModel('CF2612')
                    ->setCountry('ИТАЛИЯ')
                    ->setProductTypeDesc('КЕДЫ')
                    ->setColor('005')
                    ->setMaterialDown('100 - резина')
                    ->setMaterialUpper('100 - натуральная кожа')
                    ->setMaterialLining('100 - натуральная кожа')
                    ->setGoodSignedFlag('true')
                    ->setGoodTurnFlag('true')
                    ->setGoodMarkFlag('true')
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

    public function testDeserializeError(): void
    {
        $this->expectException(IsmpSerializerErrorException::class);

        $this->serializer->deserialize('NOT_A_CLASS', null);
    }

    public function testSerializeError(): void
    {
        $this->expectException(IsmpSerializerErrorException::class);

        $this->serializer->serialize(new class {
            public function getProperty(): string
            {
                throw new \Exception();
            }
        });
    }
}
