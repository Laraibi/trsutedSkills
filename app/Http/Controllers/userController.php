<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use Illuminate\Database\Schema\Builder;
use Illuminate\Database\Eloquent\Builder;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $prospects = User::where('role', 2)->withCount([
            'codifs as codifsCount', 'rappels as rappelsInQueueCount' => function (Builder $query) {
                $query->where('isHonored', false);
            }
        ])->get();



        return response()->json($prospects);
    }

    public function resetUserPass(Request $request)
    {
        $request->validate(['user_id' => 'required']);
        $user = User::find($request->user_id);
        if (!$user) {
            return response()->json(["error" => "user id not found"], 404);
        }
        $user->resetPass();
        return response()->json(['user' => $user]);
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
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);
        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'role' => 2
        ]);

        return response()->json([
            'user' => $user->loadCount([
                'codifs as codifsCount', 'rappels as rappelsInQueueCount' => function (Builder $query) {
                    $query->where('isHonored', false);
                }
            ]),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        if (!$user) {

            return response()->json(['error' => 'inexistant user id'], 404);
        }
        return response()->json($user);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        $user = User::find($id);
        if (!$user) {
            return response()->json(['error' => 'inexistant user id'], 404);
        }
        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
        ]);

        return response()->json([
            'user' => $user,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $User = User::find($id);
        if (!$User) {

            return response()->json(['error' => 'inexistant User id'], 404);
        }
        $User->delete();
        return response()->json(['user' => $User]);
    }
}
