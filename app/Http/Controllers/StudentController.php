<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Contact;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    // $students = Student::with('contact')
    // ->get();
    $students = Student::where('gender','F')
    ->withWhereHas('contact',function ($query)  {
        $query->where('city','Barishal');
    })->get();
    // $students = Student::where('gender','F')
    // ->whereHas('contact',function ($query)  {
    //     $query->where('city','Barishal');
    // })->get();
    return $students;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $student = Student::create([
            'name'=>"John Abraham",
            'age'=>"18",
            'gender'=>'M'

        ]);
        $student->contact()->create([
            'email'=>'john@gmail.com',
            'phone'=>'123456',
            'address'=>'#John Road',
            'city'=>'Khulna',
            'student_id'=>6

        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
