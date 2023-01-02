<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;

class StudentAuthController extends Controller
{
    private $student;
    public function login(Request $request)
    {
        $this->student = Student::where('email', $request->email)->first();
        if ($this->student)
        {
            if ($this->student->status == 1)
            {
                if (password_verify($request->password, $this->student->password))
                {
                    Session::put('student_id', $this->student->id);
                    Session::put('student_name', $this->student->name);

                    return redirect('/student-dashboard');
                }
                else
                {
                    return redirect()->back()->with('message', 'Sorry.. Your password address is invalid');
                }
            }
            else
            {
                return redirect()->back()->with('message', 'Sorry.. Your account is inactive. Contact With Admin');
            }

        }
        else
        {
            return redirect()->back()->with('message', 'Sorry.. Your email address is invalid');
        }

    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|regex:/^[a-zA-Z- ]+$/',
            'email' => 'required|unique:students,email:rfc,dn',
            'password' => 'required',
            'mobile' => 'required|unique:students,mobile',
        ],
        [
            'name.required' => 'please insert A-Z character only',
            'name.regex' => 'Don`t insert any number',
            'email.required' => 'please insert valid email',
            'email.unique' => 'don`t insert invalid or name email',
            'password.required' => 'Please Insert a strong Password',
            'mobile.required' => 'please insert Number Only',
            'mobile.unique' => 'don`t insert invalid number',
        ]);

        $this->student = Student::newStudent($request);
        Session::put('student_id', $this->student->id);
        Session::put('student_name', $this->student->name);

        return redirect('/student-dashboard');

    }
    public function dashboard()
    {
        return view('student.dashboard.index');
    }

    public function logout()
    {
        Session::forget('student_id');
        Session::forget('student_name');

        return redirect('/login-registration');
    }
}
