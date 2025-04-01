<?php

namespace App\Filament\Widgets;

use App\Models\Payment;
use App\Models\Room;
use App\Models\Testimonial;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected static ?string $pollingInterval = '30s'; // Auto-refresh setiap 30 detik

    protected function getStats(): array
    {
        // Data keseluruhan
        $totalInitial = Room::sum('initial_quantity');
        $totalAvailable = Room::sum('quantity');
        $totalOccupied = $totalInitial - $totalAvailable;
        $occupancyRate = $totalInitial > 0 ? round(($totalOccupied / $totalInitial) * 100) : 0;

        // Data per tipe kamar
        $roomTypes = Room::selectRaw('
                type, 
                sum(initial_quantity) as initial,
                sum(quantity) as available,
                sum(initial_quantity - quantity) as occupied
            ')
            ->groupBy('type')
            ->get();

        $roomTypeStats = [];
        foreach ($roomTypes as $type) {
            $percentage = $type->initial > 0 ? round(($type->occupied / $type->initial) * 100) : 0;
            
            $roomTypeStats[] = Stat::make($type->type, $type->available.'/'.$type->initial)
                ->description("{$type->occupied} terisi ({$percentage}%)")
                ->descriptionIcon($this->getRoomTypeIcon($type->type))
                ->color($this->getRoomTypeColor($type->type))
                ->chart($this->getRoomTrendData($type->type))
                ->chartColor($this->getRoomTypeColor($type->type))
                ->extraAttributes(['class' => 'hover:shadow-md transition cursor-pointer'])
                ->url(route('filament.admin.resources.rooms.index', [
                    'tableFilters[type][value]' => $type->type
                ]));
        }

        return array_merge([
            Stat::make('Total Kamar', $totalInitial)
                ->description("{$totalAvailable} tersedia, {$totalOccupied} terisi ({$occupancyRate}%)")
                ->descriptionIcon('heroicon-o-home-modern')
                ->color('primary')
                ->chart($this->getOverallTrendData())
                ->url(route('filament.admin.resources.rooms.index')),
                
            Stat::make('Tingkat Okupansi', $occupancyRate.'%')
                ->description($this->getOccupancyStatus($occupancyRate))
                ->descriptionIcon($this->getOccupancyIcon($occupancyRate))
                ->color($this->getOccupancyColor($occupancyRate))
                ->chart($this->getOccupancyTrendData())
                ->url(route('filament.admin.resources.rooms.index', [
                    'tableSortColumn' => 'initial_quantity',
                    'tableSortDirection' => 'desc'
                ])),
        ], $roomTypeStats, [
            Stat::make('Pembayaran Pending', Payment::where('status', 'pending')->count())
                ->description('Menunggu verifikasi')
                ->descriptionIcon('heroicon-o-clock')
                ->color('warning')
                ->url(route('filament.admin.resources.payments.index', [
                    'tableFilters[status][value]' => 'pending'
                ])),
                
            Stat::make('Testimoni Baru', Testimonial::where('is_approved', false)->count())
                ->description('Menunggu persetujuan')
                ->descriptionIcon('heroicon-o-chat-bubble-left-ellipsis')
                ->color('danger')
                ->url(route('filament.admin.resources.testimonials.index', [
                    'tableFilters[is_approved][value]' => 'false'
                ])),
        ]);
    }

    protected function getRoomTypeIcon(string $type): string
    {
        return match ($type) {
            'Include Listrik' => 'heroicon-o-bolt',
            'Listrik Sendiri' => 'heroicon-o-light-bulb',
            default => 'heroicon-o-home',
        };
    }

    protected function getRoomTypeColor(string $type): string
    {
        return match ($type) {
            'Include Listrik' => 'success',
            'Listrik Sendiri' => 'warning',
            default => 'gray',
        };
    }

    protected function getOccupancyStatus(int $percentage): string
    {
        return match (true) {
            $percentage >= 80 => 'Okupansi Tinggi',
            $percentage >= 50 => 'Okupansi Sedang',
            $percentage >= 20 => 'Okupansi Rendah',
            default => 'Okupansi Sangat Rendah',
        };
    }

    protected function getOccupancyIcon(int $percentage): string
    {
        return match (true) {
            $percentage >= 80 => 'heroicon-o-arrow-trending-up',
            $percentage >= 50 => 'heroicon-o-arrow-right',
            $percentage >= 20 => 'heroicon-o-arrow-trending-down',
            default => 'heroicon-o-exclamation-triangle',
        };
    }

    protected function getOccupancyColor(int $percentage): string
    {
        return match (true) {
            $percentage >= 80 => 'danger', // Merah jika terlalu penuh
            $percentage >= 50 => 'success', // Hijau jika optimal
            $percentage >= 20 => 'warning', // Kuning jika sepi
            default => 'gray', // Abu-abu jika sangat sepi
        };
    }

    protected function getOverallTrendData(): array
    {
        // Data dummy - dalam implementasi nyata ambil dari database
        return [10, 15, 12, 18, 20, 17, 25];
    }

    protected function getOccupancyTrendData(): array
    {
        // Data dummy - dalam implementasi nyata ambil dari database
        return [60, 65, 70, 75, 72, 68, 80];
    }

    protected function getRoomTrendData(string $type): array
    {
        // Data dummy berbeda per tipe kamar
        return match ($type) {
            'Include Listrik' => [5, 8, 6, 9, 10, 8, 12],
            'Listrik Sendiri' => [3, 5, 4, 6, 7, 5, 8],
            default => [2, 3, 2, 3, 4, 3, 5],
        };
    }
}