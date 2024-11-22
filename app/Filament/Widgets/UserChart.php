<?php

namespace App\Filament\Widgets;

use Leandrocfe\FilamentApexCharts\Widgets\ApexChartWidget;
use App\Models\User;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Illuminate\Support\Carbon;
use Filament\Widgets\Concerns\InteractsWithPageFilters;

class UserChart extends ApexChartWidget
{
    use InteractsWithPageFilters;

    /**
     * Chart Id
     *
     * @var string
     */
    protected static ?string $chartId = 'userChart';

    /**
     * Widget Title
     *
     * @var string|null
     */
    protected static ?string $heading = 'USER REGISTRATION';
    protected int | string | array $columnSpan = 'full';

    /**
     * Chart options (series, labels, types, size, animations...)
     * https://apexcharts.com/docs/options
     *
     * @return array
     */
    protected function getOptions(): array
    {
        $start = $this->filters['startDate'] ?? null;
        $end = $this->filters['endDate'] ?? null;

        // Ambil data total pendaftaran pengguna
        $totalData = $this->getTotalData($start, $end);

        $series = [];
        if ($totalData->isNotEmpty()) {
            $series[] = [
                'name' => 'TOTAL',
                'data' => $totalData->map(fn(TrendValue $value) => $value->aggregate),
                'color' => 'teal', // Warna garis
            ];
        }

        return [
            'chart' => [
                'type' => 'line',
                'height' => 300,
            ],
            'series' => $series,
            'xaxis' => [
                'categories' => $totalData->map(fn(TrendValue $value) => Carbon::parse($value->date)->translatedFormat('M y')),
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'yaxis' => [
                'labels' => [
                    'style' => [
                        'fontFamily' => 'inherit',
                    ],
                ],
            ],
            'stroke' => [
                'curve' => 'smooth',
                'width' => 2,
            ],
            'grid' => [
                'show' => false,
                'borderColor' => '#e0e0e0',
                'strokeDashArray' => 1,
                'xaxis' => [
                    'lines' => [
                        'show' => true,
                    ],
                ],
                'yaxis' => [
                    'lines' => [
                        'show' => true,
                    ],
                ],
            ],
        ];
    }

    /**
     * Mengambil data total pengguna
     */
    private function getTotalData($start, $end)
    {
        $query = User::query();
        return Trend::query($query)
            ->dateColumn('created_at')
            ->between(
                start: $start ? Carbon::parse($start) : now()->subMonths(6),
                end: $end ? Carbon::parse($end) : now()
            )
            ->perMonth()
            ->count();
    }
}
