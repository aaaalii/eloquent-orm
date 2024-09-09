<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use app\Http\Requests\StudentRequest;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::simplePaginate(3);
        //$student = Student::find([2, 3], ['name', 'city']);
        // ::count()
        // ::min('age'), max()
        // sum()

        // foreach ($students as $student) {
        //     echo $student->name, "<br>";
        // }

        // $student = Student::where('city', 'lahore')->get();
        //$student = Student::whereRaw('age > ?', [18])->get();
        // $student = Student::select('name as username')->whereCity('sharaqpur')->get();
        // return $student;

        // return view('welcome', ['data' => $students]);
        return view('home', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('addUser');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $req)
    {
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'age'  => 'required|integer|min:0',
            'city' => 'required|string|max:255',
        ]);

        // $student = new Student;

        // $student->name = $validatedData['name'];
        // $student->age = $validatedData['age'];
        // $student->city = $validatedData['city'];
        // $student->save();

        Student::create([
            'name' => $validatedData['name'],
            'age' => $validatedData['age'],
            'city' => $validatedData['city'],
        ]);


        return redirect()->route('students.index')
                        ->with('status', 'New User Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $student)
    {
        $data = Student::findOrFail($student);
        //return $data;
        return view('viewStudent', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $student = Student::findOrFail($id);
        return view('updateUser', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $req, string $id)
    {
        
        //$user = Student::findOrFail($id);

        // method 1
        // $user->name = $req->name;
        // $user->age = $req->age;
        // $user->city = $req->city;
        
        $validatedData = $req->validate([
            'name' => 'required|string|max:255',
            'age'  => 'required|integer|min:0',
            'city' => 'required|string|max:255',
        ]);

        //-------------------method 2---------------
        // $user->name = $validatedData['name'];
        // $user->age = $validatedData['age'];
        // $user->city = $validatedData['city'];

        //$user->save();

        //=-------------------method 3-----------------
        $student = Student::where('id', $id)
                            ->update([
                                'name' => $validatedData['name'],
                                'age' => $validatedData['age'],
                                'city' => $validatedData['city'],
                            ]);
        return redirect()->route('students.index')
                            ->with('status', 'Student data updated');
                        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // $student = Student::findOrFail($id);
        // $student->delete();

        // ---------------------method 2-----------------
        Student::destroy($id);

        return redirect()->route('students.index')
                        ->with('status', 'Student data deleted');    }
}
