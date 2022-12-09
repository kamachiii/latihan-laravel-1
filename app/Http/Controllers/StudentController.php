<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::get();

        return view('dashboard')->with('students', $students);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rayon' => 'required',
            'money' => 'required',
        ]);

        Student::create($request->all());

        return redirect()->route('dashboard')
                    ->with('success', 'Create Succesfully!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::where('id', $id)->first();
        return view('edit')->with('student', $student);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nis' =>'required',
            'name' =>'required',
            'rayon' =>'required',
            'method' =>'required',
            'money' =>'required',
        ]);

        $student = Student::where('id', $id)->first();

        if($request->method == 'Add Money') {
            $totalMoney = $student['money'] + $request->money;
            $student->update([
                'nis' => $request->nis,
                'name' => $request->name,
                'rayon' => $request->rayon,
                'money' => $totalMoney
            ]);

            return redirect()->route('dashboard')
                            ->with('add','Add Money Succesfully!');
        } elseif($request->method == 'Take Money'){
            if($student['money'] < $request->money){
                return redirect()->route('dashboard')
                        ->with('failed', 'Your money is not enough!');
            } else{
                $totalMoney = $student['money'] - $request->money;
                $student->update([
                    'nis' => $request->nis,
                    'name' => $request->name,
                    'rayon' => $request->rayon,
                    'money' => $totalMoney
                ]);

                return redirect()->route('dashboard')
                                ->with('take', 'Take Succesfully!');
            }
        }
        $student->update([
            'nis' => $request->nis,
            'name' => $request->name,
            'rayon' => $request->rayon,
        ]);

        return redirect()->route('dashboard')
                        ->with('update','Update Succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Student::where('id', $id)->delete();
        return redirect()->route('dashboard')
                        ->with('delete','Delete Succesfully!');
    }
}
