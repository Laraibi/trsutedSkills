<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\client;

class clientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(client::all());
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
        $request->validate([
            'companyName' => 'required|min:5',
            'activity' => 'required|min:5',
            'city' => 'required|min:5',
        ]);
        $client = client::create($request->all());
        return response()->json($client);
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
        $client = client::find($id);
        if (!$client) {

            return response()->json(['error' => 'inexistant client id'], 404);
        }
        return response()->json($client);
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
        $request->validate([
            'companyName' => 'required|min:5',
            'activity' => 'required|min:5',
            'city' => 'required|min:5',
        ]);
        $client = client::find($id);
        if (!$client) {
            return response()->json(['error' => 'inexistant client id'], 404);
        }
        $client->update($request->except(['id', 'companyName']));
        // $client->update($request->all());
        return response()->json($client);
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
        $client = client::find($id);
        if (!$client) {
            return response()->json(['error' => 'inexistant client id'], 404);
        }
        $deletedState = $client->delete();
        return response()->json(['deletedState' => $deletedState, "deletedElement" => $client], 200);
    }
}
