<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Contact;
use Carbon\Carbon;

class ContactChart extends ChartWidget
{
    protected static ?string $heading = 'İletişim Formu Başvuruları';

    protected function getData(): array
    {
        // Get contacts count per day for the last 7 days
        $contacts = Contact::selectRaw('DATE(created_at) as date, COUNT(*) as count')
            ->where('created_at', '>=', Carbon::now()->subDays(7)) // Last 7 days
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        return [
            'datasets' => [
                [
                    'label' => 'Contact Messages Received',
                    'data' => $contacts->pluck('count')->toArray(),
                    'borderColor' => 'rgba(75, 192, 192, 1)',
                    'backgroundColor' => 'rgba(75, 192, 192, 0.2)',
                ],
            ],
            'labels' => $contacts->pluck('date')->map(fn ($date) => Carbon::parse($date)->format('d M'))->toArray(),
        ];
    }
 
    protected function getType(): string
    {
        return 'line';
    }
}
