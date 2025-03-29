<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Payment;
use App\Models\Room;

class Paymentpage extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $roomId;
    public $paymentMethod;
    public $amount;
    public $proofImage;
    public $note;
    public $rooms;
    public $successMessage;

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'phone' => 'required|min:10',
        'roomId' => 'required|exists:rooms,id',
        'paymentMethod' => 'required',
        'amount' => 'required|numeric|min:100000',
        'proofImage' => 'required|image|max:2048',
        'note' => 'nullable|string|max:500',
    ];

    public function mount()
    {
        $this->rooms = Room::where('is_available', true)->get();
    }

    public function updatedRoomId($value)
    {
        $room = Room::find($value);
        if ($room) {
            $this->amount = $room->price_monthly;
        }
    }

    public function submit()
    {
        $this->validate();

        $imagePath = $this->proofImage->store('payment-proofs', 'public');

        Payment::create([
            'name' => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'room_id' => $this->roomId,
            'payment_method' => $this->paymentMethod,
            'amount' => $this->amount,
            'proof_image' => $imagePath,
            'note' => $this->note,
            'payment_date' => now(),
        ]);

        $this->reset(['name', 'email', 'phone', 'roomId', 'paymentMethod', 'amount', 'proofImage', 'note']);
        $this->successMessage = 'Bukti pembayaran berhasil dikirim. Kami akan memverifikasi pembayaran Anda segera.';

        session()->flash('success', $this->successMessage);
    }

    public function render()
    {
        return view('livewire.payment')
            ->layout('layouts.guest', ['title' => 'Pembayaran']);
    }
}
