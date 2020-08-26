<?php

namespace Impl\Serializer;

use Lamoda\IsmpClient\Impl\Serializer\FacadeDocBodyResponseBodyDenormalizer;
use Lamoda\IsmpClient\Tests\Stub\SerializerDenormalizer;
use Lamoda\IsmpClient\V3\Dto\FacadeDocBodyResponse\Body;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class FacadeDocBodyResponseBodyDenormalizerTest extends TestCase
{
    /**
     * @var FacadeDocBodyResponseBodyDenormalizer
     */
    private $denormalizer;
    /**
     * @var MockObject|DenormalizerInterface
     */
    private $inner;

    protected function setUp(): void
    {
        $this->inner = $this->createMock(SerializerDenormalizer::class);
        $this->denormalizer = new FacadeDocBodyResponseBodyDenormalizer();
    }

    /**
     * @dataProvider dataSupportsDenormalization
     */
    public function testSupportsDenormalization(string $type, array $data, bool $expected): void
    {
        $result = $this->denormalizer->supportsDenormalization($data, $type);

        $this->assertEquals($expected, $result);
    }

    public function dataSupportsDenormalization(): array
    {
        return [
            [
                Body::class,
                [
                    'original_string' => 'foobar',
                ],
                false,
            ],
            [
                Body::class,
                [],
                true,
            ],
            [
                \stdClass::class,
                [],
                false,
            ],
        ];
    }

    public function testDenormalizeWithDenormalizerIsNotSet(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->denormalizer->denormalize([], Body::class);
    }

    public function testDenormalizeWithWrongData(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $this->expectException(InvalidArgumentException::class);
        $this->denormalizer->denormalize('wrong', Body::class);
    }

    public function testDenormalizeWithWrongType(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $this->expectException(InvalidArgumentException::class);
        $this->denormalizer->denormalize([], \stdClass::class);
    }

    public function testSetDenormalizerWithNoSerializer(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->denormalizer->setDenormalizer($this->createMock(DenormalizerInterface::class));
    }

    public function testDenormalize(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $originalBodyData = [
            'some_new_crpt_field' => true,
            'document_description' => 'description',
            'products' => [
                [
                    'uit_code' => '010464005741102021PMRanDom32406404',
                    'product_cost' => 42,
                    'product_tax' => 1.1,
                    'product_description' => 'product description 2'
                ],
                [
                    'uit_code' => '010RanDom463007357256021c140640422',
                    'product_cost' => 42,
                    'product_tax' => 1.1,
                    'product_description' => 'product description 2'
                ],
            ]
        ];
        $expectedResult = new Body();
        $property = new \ReflectionProperty(Body::class, 'originalString');
        $property->setAccessible(true);
        $property->setValue($expectedResult, json_encode($originalBodyData));
        $property = new \ReflectionProperty(Body::class, 'documentDescription');
        $property->setAccessible(true);
        $property->setValue($expectedResult, 'description');

        $this->inner->expects($this->once())
            ->method('serialize')
            ->with($originalBodyData, null, [])
            ->willReturn($originalBodyData);
        $enrichedOriginalBodyData = array_merge($originalBodyData, ['original_string' => $originalBodyData]);
        $this->inner->expects($this->once())
            ->method('denormalize')
            ->with($enrichedOriginalBodyData, Body::class, null, [])
            ->willReturn($expectedResult);

        $result = $this->denormalizer->denormalize(
            $originalBodyData,
            Body::class
        );

        $this->assertEquals($expectedResult, $result);
    }

    public function testHasCacheableSupportsMethod(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $result = $this->denormalizer->hasCacheableSupportsMethod();
        $this->assertFalse($result);
    }
}
