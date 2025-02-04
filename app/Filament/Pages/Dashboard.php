<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\QuotesChart;
use App\Filament\Widgets\NewsletterChart;

class Dashboard extends Page
{

    protected static string $view = 'filament.pages.dashboard';

    protected static ?string $title = 'Yönetim Paneli'; // 👈 Page Title

    protected static ?string $navigationIcon = 'heroicon-o-home'; // 👈 Change Sidebar Icon




    protected function getHeaderWidgets(): array
    {
        return [
            QuotesChart::class,
            NewsletterChart::class,
        ];
    }


    protected function getColumns(): int | array
    {
        return [
            3, 
            1, 
        ];
    }
  
}
