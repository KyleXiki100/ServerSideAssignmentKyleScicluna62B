<?php

namespace App\Models;
use App\Models\students;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    //uses HasFactory;
    public function students(){
        return $this->hasMany(Students::class);
    }
}
