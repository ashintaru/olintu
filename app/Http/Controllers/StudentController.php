<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Models\progress;
use App\Models\lsesson;
class StudentController extends Controller
{
    public function dashboard()
    {
        $lessons = lsesson::get();
        $progress = progress::where('student_id',Session::get('user')->STUDENT_ID)->with(['lesson'])->get();
        // dd($progress);
        return view('dashboard',['lessons'=>$lessons,'progress'=>$progress]);
    }
}
