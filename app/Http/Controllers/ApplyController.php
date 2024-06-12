<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\PostJob;
use Illuminate\Http\Request;

class ApplyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $jbs = PostJob::orderBy('created_at', "DESC")->get();
        return view('jobseeker.index',compact('jbs'));    
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
        Apply::create($request->all());

        return redirect()->route('jba-index')->with('success','jobs');
    }

    /**
     * Display the specified resource.
     */
    public function show(Apply $apply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Apply $apply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Apply $apply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Apply $apply)
    {
        //
    }
}
