<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;

class Rooms extends Component
{
    public $rooms;

    public function mount()
    {
        $this->rooms = Room::where('is_available', true)
            ->with(['images', 'facilities'])
            ->orderBy('order')
            ->get();
    }

    public function render()
    {
        return view('livewire.rooms')
            ->layout('layouts.guest', ['title' => 'Daftar Kamar']);
    }
}
