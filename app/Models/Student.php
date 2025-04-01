<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\College;

class Student extends Model
{
    //uses HasFactory;
    public function college(){
        return $this->belongsTo(College::class);
    }

    
}
