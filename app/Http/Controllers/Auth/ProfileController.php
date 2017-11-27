<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('auth.profile.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $user = Auth::user();

        return view('auth.profile.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $user = Auth::user();

            $attributes = $request->all();

            if($request->has('password'))
                $attributes['password'] = bcrypt($request->get('password'));

            $user->update($attributes);
            return redirect()->route('auth.profile.show', ['id' => $user->id])->with('success', ('updated'));
        } catch (\Exception $e) {
            return redirect()->route('auth.profile.show', ['id' => $user->id])->with('error', $e->getMessage());
        }
    }
}
