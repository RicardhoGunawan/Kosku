<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;

class About extends Component
{
    public $title;
    public $description;
    public $image;

    public function mount()
    {
        $this->title = Setting::getValue('about.title', 'Tentang Kos Kami');
        $this->description = Setting::getValue('about.description', '');
        $this->image = Setting::getValue('about.image');
    }

    public function render()
    {
        return view('livewire.about')
            ->layout('layouts.guest', ['title' => $this->title]);
    }
}
