<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Room;
use App\Models\Facility;
use App\Models\Gallery;
use App\Models\Testimonial;
use App\Models\Setting;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Settings
        Setting::create([
            'key' => 'site_name',
            'value' => 'Kosku',
            'group' => 'general'
        ]);

        Setting::create([
            'key' => 'contact_phone',
            'value' => '+6281234567890',
            'group' => 'contact'
        ]);

        Setting::create([
            'key' => 'about_content',
            'value' => 'Kosku menyediakan kamar kos yang nyaman dan terjangkau untuk mahasiswa dan pekerja.',
            'group' => 'about'
        ]);

        // Facilities
        $facilities = [
            ['name' => 'Kamar Mandi Dalam', 'icon' => '🚿', 'type' => 'room'],
            ['name' => 'AC', 'icon' => '❄️', 'type' => 'room'],
            ['name' => 'Kipas Angin', 'icon' => '🌀', 'type' => 'room'],
            ['name' => 'Lemari', 'icon' => '👔', 'type' => 'room'],
            ['name' => 'Kasur', 'icon' => '🛏️', 'type' => 'room'],
            ['name' => 'Meja Belajar', 'icon' => '📚', 'type' => 'room'],
            ['name' => 'WiFi', 'icon' => '📶', 'type' => 'public'],
            ['name' => 'Dapur Bersama', 'icon' => '🍳', 'type' => 'public'],
            ['name' => 'Laundry', 'icon' => '👕', 'type' => 'public'],
            ['name' => 'Parkir Motor', 'icon' => '🏍️', 'type' => 'public'],
        ];

        foreach ($facilities as $facility) {
            Facility::create([
                'name' => $facility['name'],
                'slug' => Str::slug($facility['name']), // Tambahkan slug
                'icon' => $facility['icon'],
                'type' => $facility['type'],
            ]);
        }

        // Rooms
        $room1 = Room::create([
            'name' => 'Kamar Standard',
            'slug' => 'kamar-standard',
            'type' => 'Include Listrik',
            'price_monthly' => 1500000,
            'price_yearly' => 16000000,
            'size' => 16,
            'capacity' => 1,
            'description' => 'Kamar nyaman dengan fasilitas lengkap untuk kebutuhan harian Anda.',
            'is_available' => true,
        ]);

        $room1->facilities()->attach([1, 3, 4, 5, 6, 7]);

        $room2 = Room::create([
            'name' => 'Kamar VIP',
            'slug' => 'kamar-vip',
            'type' => 'Include Listrik',
            'price_monthly' => 2500000,
            'price_yearly' => 26000000,
            'size' => 20,
            'capacity' => 2,
            'description' => 'Kamar luas dengan AC dan fasilitas premium untuk kenyamanan maksimal.',
            'is_available' => true,
        ]);

        $room2->facilities()->attach([1, 2, 4, 5, 6, 7, 8]);

        // Testimonials
        Testimonial::create([
            'name' => 'Andi Pratama',
            'position' => 'Mahasiswa',
            'content' => 'Tempatnya nyaman dan harganya terjangkau. Pelayanannya juga ramah.',
            'rating' => 5,
            'is_approved' => true,
            'is_featured' => true,
        ]);

        // Gallery
        Gallery::create([
            'image_path' => 'gallery/kos1.jpg',
            'caption' => 'Tampak depan kos',
            'category' => 'bangunan',
            'is_featured' => true,
        ]);
    }
}
