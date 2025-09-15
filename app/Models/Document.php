<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enrollment extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'lrn',
        'psa_birth_cert_no',
        'last_name',
        'first_name',
        'middle_name',
        'suffix',
        'birthdate',
        'place_of_birth',
        'sex',
        'is_ip',
        'ip_specify',
        'is_4ps_beneficiary',
        'four_ps_number',
        'disability',
        'current_address',
        'permanent_address',
        'father_name',
        'father_contact',
        'mother_name',
        'mother_contact',
        'guardian_name',
        'guardian_contact',
    ];

    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
