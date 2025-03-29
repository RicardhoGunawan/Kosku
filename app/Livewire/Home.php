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
        $this->featuredRooms = Room::where('is_available', true)
            ->orderBy('order')
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