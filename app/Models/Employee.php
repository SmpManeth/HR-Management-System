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
        'Stage_name',
        'dob',
        'nic',
        'Address',
        'Contact_Number',
        'work_location',
        'joined_date',
        'Emergency_Contact_First_Name',
        'Emergency_Contact_Last_Name',
        'Emergency_Contact_Contact_no',
        'Emergency_Contact_Relationship',
        'Emergency_Contact_Address',
    ];

    public function attendances()
    {
        return $this->hasMany(Attendence::class);
    }
}
