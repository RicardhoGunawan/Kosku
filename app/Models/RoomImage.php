<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RoomImage extends Model
{
    protected $fillable = ['room_id', 'image_path', 'alt_text', 'is_main_image', 'order'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
