<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    protected $fillable = ['name', 'address'];
    use HasFactory;

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
