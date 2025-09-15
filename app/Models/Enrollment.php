<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'birthdate',
        'place_of_birth',
        'sex',
        'ip_community',
        'is_4ps_beneficiary',
        'is_pwd',
        'disability_type',
        'current_address',
        'permanent_address',
        'father_name',
        'mother_name',
        'guardian_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
