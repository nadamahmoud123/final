<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Redirect;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $subjects = subject::paginate(3);
        return view('subjects.index', ['subjects' => $subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Auth::user()) {
            return Redirect('login');
        }
        $this->authorize('create', Subject::class);
        $departments = Department::get();

        return view('subjects.create', ['departments' => $departments]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!Auth::user()) {
            return Redirect('login');
        }
        $this->authorize('create', Subject::class);
        $formFields = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'department_id' => 'required'
        ]);
        subject::create($formFields);
        return Redirect::route('subjects.index')->with('success', 'subject added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $subject = Subject::where('id', '=', $id)->with('department')->first(); // return arr first row i have a field department
        return view('subjects.show', ['subject' => $subject]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(subject $subject)
    {
        if (!Auth::user()) {
            return Redirect('login');
        }
        $departments = Department::get();

        return view('subjects.edit', ['subject' => $subject], ['departments' => $departments]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, subject $subject)
    {

        if (!Auth::user()) {
            return Redirect('login');
        }
        $this->authorize('update', Subject::class);
        /*   if (!Gate::allows('update-subject')) {
            return 'Not authorized';
        } */
        /*  $this->authorize('update-subject'); */

        $formFields = $request->validate([
            'name' => 'required',
            'code' => 'required',
            'department_id' => 'required'
        ]);
        $subject->update($formFields);
        return Redirect::route('subjects.show', $subject->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(subject $subject)
    {
        if (!Auth::user()) {
            return Redirect('login');
        }
        $subject->delete();
        return Redirect::route('subjects.index')->with('delete', 'subject deleted ');
    }
}
