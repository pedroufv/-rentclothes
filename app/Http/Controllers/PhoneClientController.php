<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PhoneClientController extends Controller
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
        return view('phone_client.create', compact('phone'));
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
          $phone->clients()->attach($request->client);
          return redirect()->route('phone_client.show', ['client' => $request->client, 'phone' => $phone->id])->with('success', ('created'));
      } catch (\Exception $e) {
          return redirect()->route('clients.show', ['id' => $request->client])->with('error', $e->getMessage());
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
        return view('phone_client.show', compact('client','phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        return view('phone_client.edit', compact('client','phone'));
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
          return redirect()->route('phone_client.show', ['client' => $request->client, 'phone' => $phone->id])->with('success', ('updated'));
      } catch (\Exception $e) {
          return redirect()->route('phone_client.show', ['client' => $request->client, 'phone' => $phone->id])->with('error', $e->getMessage());
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
