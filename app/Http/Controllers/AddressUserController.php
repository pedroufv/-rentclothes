<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressUserController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('address_user.create');
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
          $address = Address::create($request->all());
          $address->users()->attach(Auth::user()->id);
          return redirect()->route('address_user.show', ['id' => $address->id])->with('success', ('created'));
      } catch (\Exception $e) {
          return redirect()->route('profile')->with('error', $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return view('address_user.show', compact('address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('address_user.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
      try {
          $address->update($request->all());
          return redirect()->route('address_user.show', ['id' => $address->id])->with('success', ('updated'));
      } catch (\Exception $e) {
          return redirect()->route('address_user.show', ['id' => $address->id])->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
      try {
          $address->delete();
          return redirect()->route('profile')->with('success',('destroyed'));
      } catch (\Exception $e) {
          return redirect()->route('profile')->with('error',$e->getMessage());
      }
    }
}
