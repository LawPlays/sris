<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'lrn',
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'contact_number',
        'address',
        'strand_id',
        'status',
        'user_id', // ✅ added para sa link with users table
    ];

    // 🔗 Relationships
    public function user()
    {
        return $this->belongsTo(User::class); // bawat student ay may kaukulang user account
    }

    public function strand()
    {
        return $this->belongsTo(Strand::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    // 🔗 Kung may subjects via enrollment pivot
    public function subjects()
    {
        return $this->belongsToMany(Subject::class, 'enrollments')
                    ->withTimestamps();
    }

    // ✅ Accessor para full name
    public function getFullNameAttribute(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
