<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use App\Models\Room;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('Total Kamar', Room::count())
                ->description('Jumlah kamar tersedia')
                ->descriptionIcon('heroicon-o-home')
                ->color('success'),
            Stat::make('Pembayaran Baru', Payment::where('status', 'pending')->count())
                ->description('Menunggu verifikasi')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning'),
            Stat::make('Testimoni Baru', Testimonial::where('is_approved', false)->count())
                ->description('Menunggu persetujuan')
                ->descriptionIcon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('danger'),
        ];
    }
}
