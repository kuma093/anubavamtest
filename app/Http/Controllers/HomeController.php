<?php

namespace App\Http\Controllers;

use App\Models\Mapper;
use App\Models\Student;
use App\Models\Teacher;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index()
    {
        return "Welcome";
    }

    public function home()
    {
        $studentdata = Student::all();
        $teacherdata = Teacher::all();
        return view('home',['studentdata'=>$studentdata,'teacherdata'=>$teacherdata]);
    }

    public function map()
    {
        echo "123";
    }

    public function mapper(Request $request)
    {
        if($request->isMethod('post'))
        {
            $teachers = $request->input('teachers');
            $students = $request->input('students');
    
            $teacherCount = count($teachers);
            $studentCount = count($students);
    
            $teacherIndex = 0;
            if($studentCount > 0 && $teacherCount > 0)
            {
            foreach ($students as $student) {
                $teacher = $teachers[$teacherIndex % $teacherCount];
                Mapper::insert(['teacher_id' => $teacher, 'student_id' => $student]);
                $teacherIndex++;
            }
            return response()->json(['status'=>true]);
            }
            else
            {
            return response()->json(['status'=>false]);  
            }
        }
    }

    public function removeMapper()
    {
        if(Mapper::truncate())
        {
            return redirect()->route('home');
        }
    }

    public function listmapper()
    {
        $data = Mapper::join('student','mapper.student_id','=','student.id')->join('teacher','mapper.teacher_id','=','teacher.id')->select('mapper.id','student.student_name','teacher.teacher_name')->get();
        return view('listmapper',['data'=>$data]);
    }
}
