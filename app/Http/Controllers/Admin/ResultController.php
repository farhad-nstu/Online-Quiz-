<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\StudentRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ResultController extends Controller
{
    public function index(){


        $schools = DB::table('student_registrations')
        ->select('school')
                ->get()->unique('school');
        return view('dashboard.result.index', compact('schools'));
    }

    public function school_result(Request $request)
    {
        $min_number = (30 * 120) / 100;
        $results = StudentRegistration::where('school', $request->school_id)->where('total_score', '>', $min_number)->orderBy('total_score', 'desc')->get();
        return view('dashboard.result.schoolWiseResult', compact('results'));
    }
}
