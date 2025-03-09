<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['name','email', 'phone', 'dob', 'college_id'];
    use HasFactory;

    public function college()
    {
        return $this->belongsTo(College::class, 'college_id');
    }

}
