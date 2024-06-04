<?php

namespace App\Http\Controllers;

use App\Models\PostJob;
use Illuminate\Http\Request;

class PostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pjs = PostJob::orderBy('created_at', "DESC")->get();
        return view('company.job.index',compact('pjs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('company.job.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        PostJob::create($request->all());

        return redirect()->route('mk-index')->with('success','Job Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(PostJob $postJob)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pj = PostJob::findOrFail($id);
        
        return view('company.job.edit' , compact('pj'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pj = PostJob::findOrFail($id);
    
       
        $pj->update($request->all());

        
        return redirect()->route('mk-index')->with('success','User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pj = PostJob::findOrFail($id);

        $pj->delete();

        return redirect()->route('mk-index')->with('success','User Berhasil Dihapus');
    }
}
