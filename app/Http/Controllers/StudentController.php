<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Student;

class StudentController extends Controller
{
    
     // Display a listing of the resource.
     
    public function index()
    {
         //get data using model
         $student = Student::all();
         return view('student.index', compact('student'));
    }

    
     //Show the form for creating a new resource.
     
    public function create()
    {
        //student file ar create file return
        return view('student.create'); 
    }

    
     //Store a newly created resource in storage.
     
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:25',
            'phone' => 'required|unique:students|max:12|min:9',
            'email' => 'required|unique:students',
        ]);

        //Insert data table using model
        $student = new Student;
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        $student->save();
        if($student){
            $notification = array(
                'message'=> 'Successfully Student Inserted',
                'alert-type'=>'success'    
            );
            return Redirect()->back()->with($notification);
        }
    }

    
     //Display the specified resource.
    
    public function show($id)
    {
        //$student = DB::table('students')->where('id',$id)->first();
        $student = Student::findorfail($id);

        //return view('student.index', compact('student'));
        return view('student.viewstudent', compact('student'));
    }

    
     //Show the form for editing the specified resource.
     
    public function edit($id)
    {
        $student = Student::findorfail($id);

        return view("student.edit", compact('student'));
    }

     //Update the specified resource in storage.

    public function update(Request $request, $id)
    {
        $student = Student::findorfail($id);
        print_r($request->name);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;

        // save data using Eloquent ORM
        $student->save();

        if($student){
            $notification = array(
                'message'=> 'Successfully Student Updated',
                'alert-type'=>'info'    
            );
            return Redirect()->route('all.student')->with($notification);
        }
    }

     //Remove the specified resource from storage.
     
    public function destroy($id)
    {
        $student = Student::findorfail($id);
        $student->delete();

        if($student){
            $notification = array(
                'message'=> 'Successfully Student Deleted',
                'alert-type'=>'success'    
            );
            return Redirect()->back()->with($notification);
        }
    }
}
