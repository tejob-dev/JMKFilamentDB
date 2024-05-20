<?php

namespace App\Filament\Widgets;

use App\Models\Accueilclient;
use App\Models\Actualite;
use App\Models\Equipe;
use App\Models\Formation;
use App\Models\Partner;
use App\Models\Slide;
use App\Models\Typeformation;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Card;
use App\Models\User; // Replace with your actual User model path

class UserOverviewWidget extends StatsOverviewWidget
{
    protected static string $view = 'filament::widgets.stats-overview-widget';

    protected int | string | array $columnSpan = 2;

    protected function getCards(): array
    {
        return [
            Card::make('SLIDES', Slide::count())
                ->icon('heroicon-o-view-grid'),
            Card::make('PARTENAIRES', Partner::count())
                ->icon('heroicon-o-view-grid'),
            Card::make('ACTUALITES', Actualite::count())
                ->icon('heroicon-o-view-grid'),
            Card::make('FORMATIONS', Formation::count())
                ->icon('heroicon-o-view-grid'),
            Card::make('TYPE FORMATIONS', Typeformation::count())
                ->icon('heroicon-o-view-grid'),
            Card::make('CLIENTS', Accueilclient::count())
                ->icon('heroicon-o-view-grid'),
            Card::make('MEMBRES', Equipe::count())
                ->icon('heroicon-o-view-grid'),
            // Card::make('Active Users', User::where('active', true)->count())
            //     ->color('success')
            //     ->icon('heroicon-s-check'),
            // Card::make('Inactive Users', User::where('active', false)->count())
            //     ->color('danger')
            //     ->icon('heroicon-s-x'),
        ];
    }
}
