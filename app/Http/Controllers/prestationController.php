<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\prestation;

class prestationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(prestation::all());
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
        $request->validate(['name' => 'required', 'description' => "required"]);
        $prestation = prestation::create($request->only(['name', 'description']));
        return response()->json($prestation);
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
        $prestation = prestation::find($id);
        if (!$prestation) {

            return response()->json(['error' => 'inexistant prestation id'], 404);
        }
        return response()->json($prestation);
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
        $request->validate(['name' => 'required', 'description' => 'required']);
        $prestation = prestation::find($id);
        if (!$prestation) {

            return response()->json(['error' => 'inexistant prestation id'], 404);
        }
        $prestation->update($request->only(['name', 'description']));
        return response()->json($prestation);
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
        $prestation = prestation::find($id);
        if (!$prestation) {

            return response()->json(['error' => 'inexistant prestation id'], 404);
        }
        $prestation->delete();
        return response()->json($prestation);
    }
}
