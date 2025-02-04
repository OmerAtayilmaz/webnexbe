<?php
 
namespace App\Filament\Widgets;
 
use Filament\Widgets\ChartWidget;
use App\Models\Quote;
use Carbon\Carbon;

class QuotesChart extends ChartWidget
{
    protected static ?string $heading = 'Teklif Formu Başvuruları';
 
    protected function getData(): array
    {
        // Get quotes count per day for the last 7 days
        $quotes = Quote::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(7)) // Last 7 days
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Quotes Received',
                    'data' => $quotes->pluck('count')->toArray(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ],
            ],
            'labels' => $quotes->pluck('date')->map(fn ($date) => Carbon::parse($date)->format('d M'))->toArray(),
        ];
    }
 
    protected function getType(): string
    {
        return 'line';
    }
}