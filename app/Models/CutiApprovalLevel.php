<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CutiApprovalLevel extends Model
{
      use HasFactory;
    protected $table = 'cuti_approval_level';
    protected $fillable = ['cuti_id', 'approval_level_id', 'status'];
}
