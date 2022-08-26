<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'first_name',
        'last_name',
        'phone_number',
        'date_of_birth',
        'status',
        'gender',
        'image_link',
        'description',
        'stack_overflow',
        'linkedin',
        'github',
        'remember_token'
    ];

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }

    public function getGender()
    {
        if ($this->gender==0) {
            return "Male";
        } else {
            return "Female";
        }
//        <option value="0" selected>Male</option>
//        <option value="1">Female</option>
    }
    
    public function getFullName()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getCoursesCount()
    {
        return count($this->courses()->get());
    }
}
