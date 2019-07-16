<?php

namespace App\Http\Controllers;

use App\Teams;
use Illuminate\Http\Request;
use DataTables;
use App\Jobs;
use PDF;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('teams.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $teams = new Teams();
        return view('teams.form', compact('teams'));
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
            'name' => 'required|string',
            'image' => 'required|string',
            'career_id' => 'required|exists:jobs,id'
        ]);
        $teams = Teams::create($request->all());
        return $teams;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $teams = Teams::all();
        return view('landing', ['teams' => $teams]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teams = Teams::findOrFail($id);
        return view('teams.form', compact('teams'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'image' => 'required|string',
            'career_id' => 'required|exists:jobs,id'
        ]);
        $teams = Teams::findOrFail($id);
        $teams->update($request->all());
        return $teams;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teams  $teams
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teams = Teams::findOrFail($id);
        $teams->delete();
    }

    public function dataTable()
    {
        $teams = Teams::with('jobs');
        return DataTables::of($teams)
            ->addColumn('action', function ($teams) {
                return view('teams._action', [
                    'teams' => $teams,
                    'url_edit' => route('teams.edit', $teams->id),
                    'url_destroy' => route('teams.destroy', $teams->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }

    public function loadJobs(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('jobs')->select('id', 'career')->where('career', 'LIKE', '%' . $cari . '%')->get();
            return response()->json($data);
        }
    }

    public function exportPdf()
    {
        $data =  array();
        $data['jobs'] = Jobs::all();
        $teams = Teams::with('jobs')->paginate(20);
        $data = Teams::get();
        $pdf = PDF::loadview('pdf.teams', compact('data'));
        //$pdf->save(storage_path().'_filename.pdf');
        return $pdf->stream('teams.pdf');
    }
}
