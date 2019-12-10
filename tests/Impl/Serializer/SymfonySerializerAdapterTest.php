<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Tests\Impl\Serializer;

use Lamoda\IsmpClient\Impl\Serializer\SymfonySerializerAdapterFactory;
use Lamoda\IsmpClient\Serializer\SerializerInterface;
use Lamoda\IsmpClient\V3\Dto\AuthCertRequest;
use Lamoda\IsmpClient\V3\Dto\AuthCertResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2ItemResponse;
use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Response;
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
                json_encode([
                    'token' => 'test_token',
                ]),
                new AuthCertResponse(
                    'test_token'
                ),
            ],
            [
                FacadeDocListV2Response::class,
                json_encode([
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
                ]),
                new FacadeDocListV2Response(
                    25,
                    new FacadeDocListV2ItemResponse(
                        'b917dfb0-523d-41e0-9e64-e8bf0052c5bd',
                        '2019-01-18T06:45:35.630Z',
                        '2019-01-19T06:45:35.630Z',
                        'LP_INTRODUCE_GOODS',
                        'CHECKED_OK',
                        'test'
                    )
                ),
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
