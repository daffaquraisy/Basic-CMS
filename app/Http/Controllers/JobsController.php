<?php

namespace App\Http\Controllers;

use App\Jobs;
use Illuminate\Http\Request;
use DataTables;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('jobs.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jobs = new Jobs();
        return view('jobs.form', compact('jobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'career' => 'required|string'
        ]);
        $jobs = Jobs::create($request->all());
        return $jobs;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $jobs = Jobs::all();
        return view('landing', ['jobs' => $jobs]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $jobs = Jobs::findOrFail($id);
        return view('jobs.form', compact('jobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'career' => 'required|string'
        ]);
        $jobs = Jobs::findOrFail($id);
        $jobs->update($request->all());
        return $jobs;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Jobs  $jobs
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobs = Jobs::findOrFail($id);
        $jobs->delete();
    }

    public function dataTable()
    {
        $jobs = Jobs::query();
        return DataTables::of($jobs)
            ->addColumn('action', function ($jobs) {
                return view('jobs._action', [
                    'jobs' => $jobs,
                    'url_edit' => route('jobs.edit', $jobs->id),
                    'url_destroy' => route('jobs.destroy', $jobs->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
