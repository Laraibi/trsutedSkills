<?php

namespace App\Http\Controllers;

use App\Models\codif;
use Illuminate\Http\Request;

class codifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        return response()->json(codif::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return response()->json('hello world');
        $request->validate([
            'client_id' => 'required',
            'prestation_id' => 'required',
            'joining' => 'required',
            'attempts' => 'required',
        ]);
        // return response()->json(array_merge(["prospect_id" => $request->user()->id], $request->all()));
        $codif = codif::create(array_merge(["prospect_id" => $request->user()->id], $request->all()));

        return response()->json($codif);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


        $codif = codif::find($id);
        if (!$codif) {
            response()->json(['error' => 'codif id inexistant'], 404);
        }
        return response()->json($codif);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $codif = codif::find($id);
        if (!$codif) {
            response()->json(['error' => 'codif id inexistant'], 404);
        }
        $codif->update($request->all());
        return response()->json($codif);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $codif = codif::find($id);
        if (!$codif) {
            response()->json(['error' => 'codif id inexistant'], 404);
        }
        $deletedState = $codif->delete();
        return response()->json(["deletedState" => $deletedState, "codif" => $codif]);
    }
}
