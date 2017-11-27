<?php

namespace App\Http\Controllers;

use App\Phone;
use App\Client;
use App\Http\Requests\Phone as Request;

class ClientPhoneController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Client $client
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        return view('client_phone.create', compact('client'));
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
          return redirect()->route('client_phone.show', ['client' => $request->client, 'phone' => $phone->id])->with('success', ('created'));
      } catch (\Exception $e) {
          return redirect()->route('clients.show', ['id' => $request->client])->with('error', $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client $client
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Phone $phone)
    {
        return view('client_phone.show', compact('client','phone'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client $client
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Phone $phone)
    {
        return view('client_phone.edit', compact('client','phone'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client $client
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, Phone $phone)
    {
      try {
          $phone->update($request->all());
          return redirect()->route('client_phone.show', ['client' => $request->client, 'phone' => $phone->id])->with('success', ('updated'));
      } catch (\Exception $e) {
          return redirect()->route('client_phone.show', ['client' => $request->client, 'phone' => $phone->id])->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client $client
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Phone $phone)
    {
      try {
          $phone->delete();
          return redirect()->route('profile')->with('success',('destroyed'));
      } catch (\Exception $e) {
          return redirect()->route('profile')->with('error',$e->getMessage());
      }
    }
}
