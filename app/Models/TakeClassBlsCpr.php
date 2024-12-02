<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TakeClassBlsCpr extends Model
{
    use HasFactory;

    protected $table = 'take_class_bls_cprs';

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

    public function enrollments()
    {
        return $this->hasMany(BlsEnrollment::class, 'cna_class_id');
    }

}
