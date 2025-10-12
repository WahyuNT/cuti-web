<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $table = 'izin';
    protected $fillable = [
        'user_id',
        'tanggal_acc',
        'izin_type_id',
        'tanggal',
        'keperluan',
        'mulai_pukul',
        'sampai_pukul',
        'status',
    ];
}
