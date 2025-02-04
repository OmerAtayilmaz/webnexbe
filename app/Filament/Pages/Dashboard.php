<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Filament\Widgets\QuotesChart;

class Dashboard extends Page
{

    protected static string $view = 'filament.pages.dashboard';

    protected static ?string $title = 'Yönetim Paneli'; // 👈 Page Title

    protected static ?string $navigationIcon = 'heroicon-o-home'; // 👈 Change Sidebar Icon




    protected function getHeaderWidgets(): array
    {
        return [
            QuotesChart::class,
        ];
    }

  
}
