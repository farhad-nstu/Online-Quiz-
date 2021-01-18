<?php

namespace App\Http\Controllers;

use App\StudentRegistration;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class FrontendController extends Controller
{


    public function index(){
        return view('front.home');
    }

    public function studentRegistrationForm(){
        return view('front.student-registration');
    }

    public function studentRegistrationSave(Request $request){


       $validate =  $request->validate([
            'school' => 'required',
            'class' => 'required',
            'roll' => 'required|numeric',
            'name' => 'required',

        ]);

        if($validate){

            $student = new StudentRegistration();
            $student->school = $request->school;
            $student->class = $request->class;
            $student->roll = $request->roll;
            $student->name = $request->name;
            $student->parent_phone = $request->parent_phone;
            $student->save();

            $student_id = $student->id;


            event(new Registered($user = $this->create($request->all(),$request->school,$request->class,$request->roll,$student_id,$request->name)));
            $this->guard()->login($user);
            return redirect()->route('student.panel');
        }
    }


     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data,$school,$class,$roll,$student_id,$name)
    {
        return User::create([
            'role' => 'student',
            'name' => $name,
            'email' => $student_id.'@gmail.com',
            'password' => Hash::make('student'),
            'student_id' => $student_id,
            'school' => $school,
            'class' => $class,
            'roll' => $roll,
        ]);
    }

    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * @author
     * yeapes
     * return student panel view
     */

    public function quiz(){
        return view('front.quiz');
    }


     public function studentPanel(){
         return view('front.student.panel');
     }



}
