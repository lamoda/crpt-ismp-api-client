<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Tests\Impl\Serializer\V4;

use Lamoda\IsmpClient\Impl\Serializer\V4\FacadeCisListResponseDenormalizer;
use Lamoda\IsmpClient\V4\Dto\FacadeCisItemResponse;
use Lamoda\IsmpClient\V4\Dto\FacadeCisListResponse;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Serializer\Exception\BadMethodCallException;
use Symfony\Component\Serializer\Exception\InvalidArgumentException;
use Symfony\Component\Serializer\Normalizer\DenormalizerInterface;

final class FacadeCisListResponseDenormalizerTest extends TestCase
{
    /**
     * @var FacadeCisListResponseDenormalizer
     */
    private $denormalizer;
    /**
     * @var MockObject|DenormalizerInterface
     */
    private $inner;

    protected function setUp(): void
    {
        $this->inner = $this->createMock(DenormalizerInterface::class);
        $this->denormalizer = new FacadeCisListResponseDenormalizer();
    }

    /**
     * @dataProvider dataSupportsDenormalization
     */
    public function testSupportsDenormalization(string $type, bool $expected): void
    {
        $result = $this->denormalizer->supportsDenormalization([], $type);

        $this->assertEquals($expected, $result);
    }

    public function dataSupportsDenormalization(): array
    {
        return [
            [
                FacadeCisListResponse::class,
                true,
            ],
            [
                \stdClass::class,
                false,
            ],
        ];
    }

    public function testDenormalizationWhenDenormalizerIsNotSet(): void
    {
        $this->expectException(BadMethodCallException::class);
        $this->denormalizer->denormalize([], FacadeCisListResponse::class);
    }

    public function testDenormalizationWhenWrongData(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $this->expectException(InvalidArgumentException::class);
        $this->denormalizer->denormalize('wrong', FacadeCisListResponse::class);
    }

    public function testDenormalizationWhenWrongType(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $this->expectException(InvalidArgumentException::class);
        $this->denormalizer->denormalize([], \stdClass::class);
    }

    public function testDenormalizationWorks(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $item1 = new FacadeCisItemResponse();
        $item1->setCis('cis1');
        $item1->setCertDoc([
            'type' => 'SOME_CERTIFICATE',
            'number' => '000001',
            'date' => '2021-08-24',
        ]);
        $item2 = new FacadeCisItemResponse();
        $item2->setCis('cis2');
        $item2->setCertDoc([
            'type' => 'SOME_CERTIFICATE',
            'number' => '000002',
            'date' => '2021-08-24',
        ]);

        $expectedResult = new FacadeCisListResponse($item1, $item2);

        $this->inner->expects($this->exactly(2))
            ->method('denormalize')
            ->withConsecutive(
                ['first', FacadeCisItemResponse::class, null, []],
                ['second', FacadeCisItemResponse::class, null, []]
            )
            ->willReturnOnConsecutiveCalls(
                $item1,
                $item2
            );

        $result = $this->denormalizer->denormalize([
            'first',
            'second',
        ], FacadeCisListResponse::class);

        $this->assertEquals($expectedResult, $result);
    }

    public function testHasCacheableSupportsMethod(): void
    {
        $this->denormalizer->setDenormalizer($this->inner);

        $result = $this->denormalizer->hasCacheableSupportsMethod();
        $this->assertFalse($result);
    }
}
