<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contact;
use App\Models\Setting;

class Contactpage extends Component
{
    public $name;
    public $email;
    public $phone;
    public $subject;
    public $message;
    public $successMessage;
    public $contactInfo;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'nullable|min:10',
        'subject' => 'required|min:5',
        'message' => 'required|min:10',
    ];

    public function mount()
    {
        $this->contactInfo = [
            'address' => Setting::getValue('contact_address'),
            'phone' => Setting::getValue('contact_phone'),
            'email' => Setting::getValue('contact_email'),
            'working_hours' => Setting::getValue('working_hours'),
        ];
    }

    public function submit()
    {
        $this->validate();

        Contact::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'subject' => $this->subject,
            'message' => $this->message,
        ]);

        $this->reset(['name', 'email', 'phone', 'subject', 'message']);
        $this->successMessage = 'Pesan Anda telah berhasil dikirim. Kami akan segera menghubungi Anda.';

        session()->flash('success', $this->successMessage);
    }

    public function render()
    {
        return view('livewire.contact')
            ->layout('layouts.guest', ['title' => 'Kontak']);
    }
}
