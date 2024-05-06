<?php

namespace App\Http\Controllers;

use App\Models\ClassesUser;
use App\Models\Subjects;
use App\Models\SubjectsUser;
use Illuminate\Http\Request;
use App\Models\Classes;
use Illuminate\Support\Facades\DB;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $subjects = DB::table('subjects')->get();
        return view('classes.classesRegister', ['subjects' => $subjects]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $classes = new Classes;

        if ($request->subjects_id) {
            $subjectsUser = SubjectsUser::where('subjects_id', $request->subjects_id)->get()->first();
            if ($subjectsUser == null) {
                return redirect()->route('dashboard')
                    ->withErrors(['error' => 'Não existe profesores para essa matéria!']);
            } else {
                $subject = Subjects::where('id', $request->subjects_id)->get()->first();

                $classeId = $classes->insertGetId([
                    'name' => $request->name,
                    'shift' => $request->shift,
                    'year' => $request->year
                ]);

                ClassesUser::create([
                    'user_id' => $subjectsUser->user_id,
                    'classes_id' => $classeId,
                    'subject' => $subject->name
                ]);


            }

        }


        return redirect()->route('dashboard')
            ->with('msg', 'Turma criada com sucesso!');



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
