<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home'); 
    }
}
