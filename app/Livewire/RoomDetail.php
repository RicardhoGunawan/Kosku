<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;

class RoomDetail extends Component
{
    public $room;
    public $relatedRooms;
    public $mainImage;
    public $otherImages;

    public function mount($slug)
    {
        $this->room = Room::where('slug', $slug)
            ->with(['images', 'facilities'])
            ->firstOrFail();

        $this->mainImage = $this->room->mainImage();
        $this->otherImages = $this->room->images()
            ->where('is_main_image', false)
            ->orderBy('order')
            ->get();

        $this->relatedRooms = Room::where('id', '!=', $this->room->id)
            ->where('is_available', true)
            ->inRandomOrder()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.room-detail')
            ->layout('layouts.guest', ['title' => $this->room->name]);
    }
}