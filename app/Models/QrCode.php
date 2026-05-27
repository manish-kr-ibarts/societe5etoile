<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'title',
        'type',
        'qr_path',
        'image_path',
        'winners_count',
    ];
}
