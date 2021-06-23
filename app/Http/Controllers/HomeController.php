<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;

class HomeController extends Controller
{
    public function __invoke(){
        
       $courses = Course::where('status', Course::PUBLICADO)->latest('id')->get()->take(8);

       return view('welcome', compact('courses'));

    }    

}
