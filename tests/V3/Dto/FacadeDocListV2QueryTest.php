<?php

declare(strict_types=1);

namespace Lamoda\IsmpClient\Tests\V3\Dto;

use Lamoda\IsmpClient\V3\Dto\FacadeDocListV2Query;
use PHPUnit\Framework\TestCase;

final class FacadeDocListV2QueryTest extends TestCase
{
    /**
     * @dataProvider dataToQueryArray
     */
    public function testToQueryArray(FacadeDocListV2Query $query, array $expected): void
    {
        $this->assertSame($expected, $query->toQueryArray());
    }

    public function dataToQueryArray(): iterable
    {
        $query = new FacadeDocListV2Query();
        yield 'query without parameters' => [
            'query' => $query,
            'expected' => ['limit' => 10],
        ];

        $dateTests = [
            'DateTime in UTC timezone' => [
                new \DateTime('2019-12-16 18:45:11', new \DateTimeZone('UTC')),
                '2019-12-16T18:45:11.000+00:00',
            ],
            'DateTimeImmutable in custom timezone' => [
                new \DateTimeImmutable('2019-12-16 18:45:11', new \DateTimeZone('Europe/Moscow')),
                '2019-12-16T18:45:11.000+03:00',
            ],
        ];

        foreach ($dateTests as $name => [$date, $expected]) {
            $query = new FacadeDocListV2Query();
            $query->setDateFrom($date);
            yield 'dateFrom: ' . $name => [
                'query' => $query,
                'expected' => ['dateFrom' => $expected, 'limit' => 10],
            ];

            $query = new FacadeDocListV2Query();
            $query->setDateTo($date);
            yield 'dateTo: ' . $name => [
                'query' => $query,
                'expected' => ['dateTo' => $expected, 'limit' => 10],
            ];
        }
    }
}
