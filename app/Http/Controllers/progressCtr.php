<?php

namespace App\Http\Controllers;

use App\Models\progress;
use Illuminate\Http\Request;

class progressCtr extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
        $progress = progress::where('lesson_id',$id)->with(['user','lesson'])->get();
        return view('controllManagement',['progress'=>$progress]);
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
        $student = progress::where('id',$id)->first();
        $student->delete();
        return back()->with(['successdelete'=>'The student Progress have been deleted successfully']);
    }
}
