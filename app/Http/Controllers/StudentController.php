<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{

    public function index()
    {
        $students = Student::latest()->paginate(5);
        return view('students.index',compact('students'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        return view('students.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        Student::create($request->all());
        return redirect()->route('students.index')->with('success','Usuário criado com sucesso!.');
    }

    public function show(Student $student)
    {
        return view('students.show',compact('student'));
    }


    public function edit(Student $student)
    {
        return view('students.edit',compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required',
            'detail' => 'required',
        ]);

        $student->update($request->all());
        return redirect()->route('students.index')->with('success','Usuário alterado com sucesso!');
    }


    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index')->with('success','Usuário deletado com sucesso!');
    }
}