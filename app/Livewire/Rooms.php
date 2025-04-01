<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use Livewire\WithPagination;

class Rooms extends Component
{
    use WithPagination;
    
    public $search = '';
    public $sortBy = 'price_monthly';
    public $sortDirection = 'asc';
    public $perPage = 9;
    public $showFilters = false;
    public $filters = [
        'price_min' => null,
        'price_max' => null,
        'type' => [],
        'facilities' => [],
        'availability' => 'all',
    ];
    
    protected $queryString = [
        'search' => ['except' => ''],
        'sortBy' => ['except' => 'price_monthly'],
        'sortDirection' => ['except' => 'asc'],
    ];
    
    public function updatedSearch()
    {
        $this->resetPage();
    }
    
    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }
    
    public function applyFilters()
    {
        $this->resetPage();
    }
    
    public function resetFilters()
    {
        $this->filters = [
            'price_min' => null,
            'price_max' => null,
            'type' => [],
            'facilities' => [],
            'availability' => 'all',
        ];
        $this->resetPage();
    }
    
    public function render()
    {
        // Parse sort field and direction
        $sortParams = explode(' ', $this->sortBy);
        $field = $sortParams[0] ?? 'price_monthly';
        $direction = $sortParams[1] ?? $this->sortDirection;
        
        $query = Room::query()
            ->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhereHas('facilities', function($query) {
                      $query->where('name', 'like', '%' . $this->search . '%');
                  });
            });
            
        // Apply filter for availability
        if ($this->filters['availability'] === 'available') {
            $query->where('is_available', true);
        } elseif ($this->filters['availability'] === 'unavailable') {
            $query->where('is_available', false);
        }
        
        // Apply price filters
        if ($this->filters['price_min']) {
            $query->where('price_monthly', '>=', $this->filters['price_min']);
        }
        if ($this->filters['price_max']) {
            $query->where('price_monthly', '<=', $this->filters['price_max']);
        }
        
        // Apply room type filters
        if (!empty($this->filters['type'])) {
            $query->whereIn('type', $this->filters['type']);
        }
        
        // Apply facility filters
        if (!empty($this->filters['facilities'])) {
            $query->whereHas('facilities', function($q) {
                $q->whereIn('id', $this->filters['facilities']);
            });
        }
        
        // Calculate available rooms
        $rooms = $query->with(['images', 'facilities'])
            ->orderBy($field, $direction)
            ->paginate($this->perPage);
            
        // Calculate available rooms count for each room
        foreach ($rooms as $room) {
            if (isset($room->quantity)) {
                $room->available_rooms = $room->quantity - $room->booked_count;
                $room->is_actually_available = $room->is_available && $room->available_rooms > 0;
            }
        }
            
        return view('livewire.rooms', [
            'rooms' => $rooms
        ])->layout('layouts.guest', ['title' => 'Daftar Kamar']);
    }
}