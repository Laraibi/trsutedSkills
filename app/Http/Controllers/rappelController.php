<?php

namespace App\Http\Controllers;

use App\Models\client;
use Illuminate\Http\Request;
use App\Models\rappel;
use App\Models\codif;

class rappelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(rappel::all());
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
        $request->validate(['client_id' => 'required', 'codif_id' => 'required', "rappelDT" => 'required']);
        $codif = codif::find($request->codif_id);
        $client = client::find($request->client_id);
        if (!$client || !$codif) {
            return response()->json(['Error' => 'codif or client id\'s not found']);
        }

        $rappel = $client->rappels()->create(array_merge(
            ['prospect_id' => $request->user()->id],
            $request->only(['codif_id', "rappelDT"])
        ));
        return response()->json(['rappel' => $rappel]);
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
        $rappel = rappel::find($id);
        if ($rappel) {
            return response()->json(["Error" => "Rappel Id innexistant"]);
        }

        return response()->json(['rappel' => $rappel]);
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
        //
        $request->validate(['client_id' => 'required', 'codif_id' => 'required', "rappelDT" => 'required']);
        $codif = codif::find($request->codif_id);
        $client = client::find($request->client_id);
        $rappel = rappel::find($id);

        if (!$client || !$codif || !$rappel) {
            return response()->json([
                'Error' => 'codif, rappel or client id\'s not found',
                'codif' => $codif,
                'client' => $client,
                'rappel' => $rappel,

            ]);
        }
        $rappel->update(array_merge(
            ['prospect_id' => $request->user()->id],
            $request->only(['client_id', 'codif_id', "rappelDT"])
        ));
        return response()->json(['rappel' => $rappel]);
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
        $rappel = rappel::find($id);
        if (!$rappel) {
            return response()->json(["Error" => "Rappel Id innexistant"]);
        }
        $deletedState = $rappel->delete();
        return response()->json([
            'deletedState' => $deletedState,
            'rappel' => $rappel
        ]);
    }
}
