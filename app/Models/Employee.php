<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'Employee_ID',
        'First_Name',
        'Last_Name',
        'email',
        'department',
        'employee_desgination',
        'weekday_shift',
        'weekend_shift',
        'total_leaves_per_month',
        'status',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendence::class);
    }
}
