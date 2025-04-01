<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Room;
use App\Models\Gallery;
use App\Models\Testimonial;

class Home extends Component
{
    public $featuredRooms;
    public $featuredGallery;
    public $testimonials;

    public function mount()
    {
        // Modifikasi query untuk menghitung ketersediaan berdasarkan quantity
        $this->featuredRooms = Room::orderBy('order')
            ->select('*')
            ->selectRaw('CASE 
                WHEN quantity < 1 THEN false 
                ELSE is_available 
            END as is_actually_available')
            ->selectRaw('CASE 
                WHEN quantity < 1 THEN 0
                WHEN is_available = true THEN quantity 
                ELSE 0 
            END as available_rooms')
            ->limit(4)
            ->get();

        $this->featuredGallery = Gallery::where('is_featured', true)
            ->orderBy('order')
            ->limit(6)
            ->get();

        $this->testimonials = Testimonial::where('is_approved', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.home')
            ->layout('layouts.guest');
    }
}