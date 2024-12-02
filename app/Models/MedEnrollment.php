<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedEnrollment extends Model
{
    use HasFactory;

    protected $table = 'med_enrollments'; // Use the correct table name

    protected $fillable = [
        'first_name',
        'last_name',
        'ssn',
        'email',
        'phone',
        'city',
        'address',
        'county',
        'postcode',
        'signature',
        'cna_class_id',
        'program_name',
        'training_code',
        'class_type',
        'course_start',
        'course_end',
        'time_start',
        'time_end',
        'application_fee',
        'read_unr',
        'payment_status',
    ];

    public function takeClassMed()
    {
        return $this->belongsTo(TakeClassMed::class, 'cna_class_id');
    }
}