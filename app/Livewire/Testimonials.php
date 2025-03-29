<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;

class Testimonials extends Component
{
    public $testimonials;
    public $featuredTestimonials;

    public function mount()
    {
        $this->testimonials = Testimonial::where('is_approved', true)
            ->orderBy('order')
            ->get();

        $this->featuredTestimonials = Testimonial::where('is_approved', true)
            ->where('is_featured', true)
            ->orderBy('order')
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.testimonials')
            ->layout('layouts.guest', ['title' => 'Testimoni']);
    }
}
