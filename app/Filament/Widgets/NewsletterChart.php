<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use App\Models\Newsletter;
use Carbon\Carbon;


class NewsletterChart extends ChartWidget
{
    protected static ?string $heading = 'Mail Abonelikleri';

    protected function getData(): array
    {
         // Count subscribers and unsubscribers
         $subscribedCount = Newsletter::where('status', 'subscribed')->count();
         $unsubscribedCount = Newsletter::where('status', 'unsubscribed')->count();
        

         return [
            'datasets' => [
                [
                    'data' => [$subscribedCount, $unsubscribedCount], // Values for the chart
                    'backgroundColor' => ['#4CAF50', '#F44336'], // Green for subscribed, Red for unsubscribed
                ],
            ],
            'labels' => ['Abone', 'Abonelikten Çıktı'], // Labels for the chart
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
