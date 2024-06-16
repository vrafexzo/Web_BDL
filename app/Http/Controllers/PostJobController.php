<?php

namespace App\Http\Controllers;

use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

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
        $user = Auth::user();
        return view('company.job.create',compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            // 'idJob' => ['required', 'max:7', Rule::unique('post_jobs')],
            'jobtitle' => 'required|max:32',
            'requirements' => 'required',
            'salary' => 'required|string',
            'dateopened' => 'required|date',
            'dateexpired' => 'required|date|after:dateopened',
        ], [
            'idJob.unique' => 'Id telah digunakan.'
        ]);
    
        PostJob::create($request->all());
        
        return redirect()->route('pj-index')->with('success', 'Job Berhasil Ditambahkan');
        
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

        
        return redirect()->route('pj-index')->with('success','User Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pj = PostJob::findOrFail($id);

        $pj->delete();

        return redirect()->route('pj-index')->with('success','Job Berhasil Dihapus');
    }
}
