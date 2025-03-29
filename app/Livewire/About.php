<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Setting;

class About extends Component
{
    public $aboutContent;
    public $visionMission;
    public $team;

    public function mount()
    {
        $this->aboutContent = Setting::getValue('about_content');
        $this->visionMission = Setting::getValue('vision_mission');
        $this->team = json_decode(Setting::getValue('team_members', '[]'), true);
    }

    public function render()
    {
        return view('livewire.about')
            ->layout('layouts.guest', ['title' => 'Tentang Kami']);
    }
}
