<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakeClass extends Model
{
    use HasFactory;

    protected $table = 'take_classes';

    protected $fillable = [
        'program_name',
        'course_start',
        'course_end',
        'time_start',
        'time_end',
        'training_code',
        'location',
        'class_type',
        'total_hours',
        'application_fee',
        'updated_at',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    // In TakeClass.php
    public function enrollments()
    {
        return $this->hasMany(CnaEnrollment::class, 'cna_class_id');
    }

}