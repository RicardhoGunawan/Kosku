<!-- resources/views/livewire/payment.blade.php -->
<div>
    <section class="py-12">
        <div class="container mx-auto px-4 max-w-3xl">
            <h1 class="text-3xl font-bold text-center mb-8">Form Pembayaran</h1>
            
            @if(session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-white rounded-lg shadow-md p-6">
                <form wire:submit.prevent="submit">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Personal Information -->
                        <div class="md:col-span-2">
                            <h2 class="text-xl font-bold mb-4">Informasi Pribadi</h2>
                            <div class="space-y-4">
                                <div>
                                    <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                                    <input type="text" id="name" wire:model="name" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    @error('name') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-700 mb-2">Email</label>
                                    <input type="email" id="email" wire:model="email" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    @error('email') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="phone" class="block text-gray-700 mb-2">Nomor Telepon</label>
                                    <input type="tel" id="phone" wire:model="phone" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    @error('phone') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Payment Information -->
                        <div class="md:col-span-2">
                            <h2 class="text-xl font-bold mb-4">Informasi Pembayaran</h2>
                            <div class="space-y-4">
                                <div>
                                    <label for="roomId" class="block text-gray-700 mb-2">Kamar</label>
                                    <select id="roomId" wire:model="roomId" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                        <option value="">Pilih Kamar</option>
                                        @foreach($rooms as $room)
                                            <option value="{{ $room->id }}">{{ $room->name }} - {{ $room->formatted_price_monthly }}/bulan</option>
                                        @endforeach
                                    </select>
                                    @error('roomId') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="paymentMethod" class="block text-gray-700 mb-2">Metode Pembayaran</label>
                                    <select id="paymentMethod" wire:model="paymentMethod" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                        <option value="">Pilih Metode</option>
                                        <option value="transfer">Transfer Bank</option>
                                        <option value="cash">Tunai</option>
                                        <option value="e-wallet">E-Wallet</option>
                                    </select>
                                    @error('paymentMethod') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="amount" class="block text-gray-700 mb-2">Jumlah Pembayaran</label>
                                    <input type="number" id="amount" wire:model="amount" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    @error('amount') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                </div>
                                <div>
                                    <label for="proofImage" class="block text-gray-700 mb-2">Bukti Pembayaran</label>
                                    <input type="file" id="proofImage" wire:model="proofImage" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary">
                                    @error('proofImage') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                                    @if($proofImage)
                                        <div class="mt-2">
                                            <img src="{{ $proofImage->temporaryUrl() }}" alt="Preview Bukti Pembayaran" class="h-32">
                                        </div>
                                    @endif
                                </div>
                                <div>
                                    <label for="note" class="block text-gray-700 mb-2">Catatan (Opsional)</label>
                                    <textarea id="note" wire:model="note" rows="3" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full bg-primary hover:bg-primary-dark text-black font-bold py-3 px-4 rounded-lg transition duration-300">
                            Kirim Bukti Pembayaran
                        </button>
                    </div>
                </form>
            </div>

            <div class="mt-8 bg-blue-50 p-6 rounded-lg">
                <h2 class="text-xl font-bold mb-4">Instruksi Pembayaran</h2>
                <div class="prose">
                    <p>Silahkan transfer ke salah satu rekening berikut:</p>
                    <ul>
                        <li>Bank ABC: 1234567890 (a.n. Nama Kos)</li>
                        <li>Bank XYZ: 0987654321 (a.n. Nama Kos)</li>
                    </ul>
                    <p>Setelah melakukan transfer, upload bukti pembayaran pada form di atas.</p>
                    <p>Pembayaran akan diverifikasi dalam 1x24 jam. Hubungi kami jika ada pertanyaan.</p>
                </div>
            </div>
        </div>
    </section>
</div>