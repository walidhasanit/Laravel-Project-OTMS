<?php

namespace App\Http\Controllers;

use App\Mail\EnrollConfirmationMail;
use App\Models\Enroll;
use App\Models\Student;
use Illuminate\Http\Request;
use Session;
use Mail;

class EnrollController extends Controller
{
    private $student, $enroll, $enrollExist, $emailData;

    public function index($id)
    {
        if (Session::get('student_id'))
        {
            $this->student = Student::find(Session::get('student_id'));
        }
        return view('website.enroll.index', ['id' => $id, 'student' => $this->student]);
    }

    public function newEnroll(Request $request, $id)
    {
        if (Session::get('student_id'))
        {
            $this->student = Student::find(Session::get('student_id'));
        }
        else
        {
            $this->validate($request, [
                'name'      => 'required|regex:/^[a-zA-Z- ]+$/',
                'email'     => 'required|unique:students,email',
                'mobile'    => 'required|unique:students,mobile',
            ], [
                'name.required' => 'please insert A-Z character only',
                'name.regex' => 'Don`t insert any number',
                'email.required' => 'please insert valid email',
                'email.unique' => 'don`t insert character or name email',
                'mobile.required' => 'please insert Number Only',
                'mobile.unique' => 'don`t insert invalid number',
            ]);
            $this->student = Student::newStudent($request);
        }

        $this->enrollExist = Enroll::where(['student_id'=>$this->student->id,'course_id'=>$id])->first();
        $this->enroll = Enroll::newEnroll($request, $this->student->id, $id);
        if ($this->enrollExist)
        {
            return redirect()->back()->with('message', 'Sorry You Are Already In THis Course');
        }


        Session::put('student_id', $this->student->id);
        Session::put('student_name', $this->student->name);


//        mail function start

        $this->emailData = [
            'name' => $this->student->name,
            'login_url' => 'http://127.0.0.1:8000/login-registration',
            'email' => $this->student->email,
            'password' => $this->student->mobile,
        ];

        Mail::to($this->student->email)->send(new EnrollConfirmationMail($this->emailData));

        return redirect('/training/complete-enroll/'.$this->enroll->id);
    }

    public function completeEnroll($id)
    {

        return view('website.enroll.complete-enroll', ['enroll' => Enroll::find($id)]);
    }

    public function getEmail()
    {
        $email = $_GET['email'];
        $this->student = Student::where('email', $email)->first();
        return response()->json($this->student);
    }
}
