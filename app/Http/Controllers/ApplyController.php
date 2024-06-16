<?php

namespace App\Http\Controllers;

use App\Models\Apply;
use App\Models\PostJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplyController extends Controller
{
    /**
     * Display the specified job detail for applying.
     */
    public function index()
    {
        $jbs = PostJob::orderBy('created_at', 'DESC')->get();
        return view('jobseeker.index', compact('jbs'));
    }
    public function apply($id)
    {
        $job = PostJob::findOrFail($id); // Menemukan pekerjaan berdasarkan ID
        return view('jobseeker.apply', compact('job'));
    }

    /**
     * Show the application form for a specific job.
     */
    public function create($id)
    {
        $job = PostJob::findOrFail($id); // Menemukan pekerjaan berdasarkan ID
        $user = Auth::user();
        return view('jobseeker.create', compact('job', 'user'));
    }

    /**
     * Store a newly created application in storage.
     */
    public function store(Request $request, $id)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'birthDate' => 'required|date',
            'email' => 'required|string|email|max:255',
            'noHp' => 'required|string|max:15',
            'cv' => 'required|file|mimes:pdf|max:2048',
        ]);

        try {
            // Create new Apply instance
            $apply = new Apply();
            $apply->idApply= Apply::generateIdApply();
            $apply->idJob = $id;
            $apply->idUser = Auth::id();
            $apply->name = $request->name;
            $apply->address = $request->address;
            $apply->birthDate = $request->birthDate;
            $apply->email = $request->email;
            $apply->noHp = $request->noHp;

            // Store the file and set the path
            if ($request->hasFile('cv')) {
                $filePath = $request->file('cv')->store('cvs');
                $apply->cv = $filePath;
            }

            // Save the application data
            $apply->save();

            // Redirect with success message
            return redirect()->route('jba-index')->with('success', 'Application submitted successfully!');
        } catch (\Exception $e) {
            // If there is an error, redirect back with error message
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
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
