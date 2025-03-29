<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Gallery;

class Gallerypage extends Component
{
    public $galleries;
    public $categories;
    public $selectedCategory = 'all';

    public function mount()
    {
        $this->galleries = Gallery::orderBy('order')->get();
        $this->categories = Gallery::select('category')
            ->distinct()
            ->whereNotNull('category')
            ->pluck('category');
    }

    public function filterByCategory($category)
    {
        $this->selectedCategory = $category;
        
        $query = Gallery::orderBy('order');
        
        if ($category !== 'all') {
            $query->where('category', $category);
        }
        
        $this->galleries = $query->get();
    }

    public function render()
    {
        return view('livewire.gallery')
            ->layout('layouts.guest', ['title' => 'Galeri']);
    }
}
