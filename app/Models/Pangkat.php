<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;
    protected $table = 'pangkat';
    protected $fillable = ['name', 'status'];

    public function users()
    {
        return $this->hasMany(User::class, 'pangkat_id');
    }
}
