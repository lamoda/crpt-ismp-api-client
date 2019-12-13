<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Tests\V3\Dto;

use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2ItemResponse;
use PHPUnit\Framework\TestCase;

final class FacadeDocListV2ItemResponseTest extends TestCase
{
    /**
     * @var FacadeDocListV2ItemResponse
     */
    private $model;

    protected function setUp(): void
    {
        $this->model = new FacadeDocListV2ItemResponse(
            'document_number_1',
            '2019-12-02T13:54:41.566Z',
            '2019-12-03T13:54:41.566Z',
            'LP_SHIP_GOODS',
            'WAIT_ACCEPTANCE',
            'ООО "ТАПИБУ"'
        );
    }

    public function testGetReceivedAtDateTime(): void
    {
        $result = $this->model->getReceivedAtDateTime();

        $this->assertEquals(new \DateTimeImmutable('2019-12-03T13:54:41.566Z'), $result);
    }

    public function testGetDocDateDateTime(): void
    {
        $result = $this->model->getDocDateDateTime();

        $this->assertEquals(new \DateTimeImmutable('2019-12-02T13:54:41.566Z'), $result);
    }
}
