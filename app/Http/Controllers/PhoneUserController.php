<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Http\Requests\Phone as Request;
use Illuminate\Support\Facades\Auth;

class PhoneUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phone_user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      try {
          $phone = Phone::create($request->all());
          $phone->users()->attach(Auth::user()->id);
          return redirect()->route('phone_user.show', ['id' => $phone->id])->with('success', ('created'));
      } catch (\Exception $e) {
          return redirect()->route('profile')->with('error', $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        return view('phone_user.show', compact('phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        return view('phone_user.edit', compact('phone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
      try {
          $phone->update($request->all());
          return redirect()->route('phone_user.show', ['id' => $phone->id])->with('success', ('updated'));
      } catch (\Exception $e) {
          return redirect()->route('phone_user.show', ['id' => $phone->id])->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
      try {
          $phone->delete();
          return redirect()->route('profile')->with('success',('destroyed'));
      } catch (\Exception $e) {
          return redirect()->route('profile')->with('error',$e->getMessage());
      }
    }
}
