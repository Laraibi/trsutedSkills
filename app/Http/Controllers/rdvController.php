<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use App\Models\rdv;

class rdvController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(rdv::all());
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
        $request->validate(['client_id' => "required", "rdvDT" => "required"]);
        $client = client::find($request->client_id);
        if (!$client) {
            return response()->json(['error' => 'client id inexistant'], 404);
        }
        $rdv = $client->rdvs()->create(array_merge(["prospect_id" => $request->user()->id], $request->only(['client_id', 'rdvDT'])));
        return response()->json(['rdv' => $rdv]);
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
        $rdv = rdv::find($id);
        if (!$rdv) {
            return response()->json(['error' => 'rdv id inexistant'], 404);
        }
        return response()->json(['rdv' => $rdv]);
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
        $rdv = rdv::find($id);
        if (!$rdv) {
            return response()->json(['error' => 'rdv id inexistant'], 404);
        }
        $rdv->update(array_merge(["prospect_id" => $request->user()->id], $request->only(['client_id', 'rdvDT'])));
        return response()->json(['rdv' => $rdv]);
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
        $rdv = rdv::find($id);
        if (!$rdv) {
            return response()->json(['error' => 'rdv id inexistant'], 404);
        }
        $deletedState = $rdv->delete();
        return response()->json(['deletedState' => $deletedState, 'rdv' => $rdv]);
    }
}
