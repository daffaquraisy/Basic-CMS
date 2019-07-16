<?php

namespace App\Http\Controllers;

use App\Informations;
use Illuminate\Http\Request;
use DataTables;
use App\Teams;
use App\Jobs;

class InformationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('informations.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $informations = new Informations();
        return view('informations.form', compact('informations'));
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
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|string'
        ]);
        $informations = Informations::create($request->all());
        return $informations;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Informations  $informations
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $data =  array();
        $data['informations'] = Informations::all();
        $data['jobs'] = Jobs::all();
        $data['teams'] = Teams::all();
        $teams = Teams::with('jobs')->paginate(20);
        return view('landing', compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Informations  $informations
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $informations = Informations::findOrFail($id);
        return view('informations.form', compact('informations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Informations  $informations
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required'
        ]);
        $informations = Informations::findOrFail($id);
        $informations->update($request->all());
        return $informations;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Informations  $informations
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informations = Informations::findOrFail($id);
        $informations->delete();
    }

    public function dataTable()
    {
        $informations = Informations::query();
        return DataTables::of($informations)
            ->addColumn('action', function ($informations) {
                return view('informations._action', [
                    'informations' => $informations,
                    'url_edit' => route('informations.edit', $informations->id),
                    'url_destroy' => route('informations.destroy', $informations->id)
                ]);
            })
            ->addIndexColumn()
            ->rawColumns(['action'])
            ->make(true);
    }
}
