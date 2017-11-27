<?php

namespace App\Http\Controllers;

use App\Address;
use App\Client;
use Illuminate\Http\Request;

class AddressClientController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Client $client)
    {
        return view('address_client.create', compact('client'));
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
          $address->clients()->attach($request->client);
          return redirect()->route('address_client.show', ['client' => $request->client, 'address' => $address->id])->with('success', ('created'));
      } catch (\Exception $e) {
          return redirect()->route('clients.show', ['id' => $request->client])->with('error', $e->getMessage());
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client, Address $address)
    {
        return view('address_client.show', compact('client','address'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client, Address $address)
    {
        return view('address_client.edit', compact('client','address'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client, Address $address)
    {
      try {
          $address->update($request->all());
          return redirect()->route('address_client.show', ['client' => $request->client, 'address' => $address->id])->with('success', ('updated'));
      } catch (\Exception $e) {
          return redirect()->route('address_client.show', ['client' => $request->client, 'address' => $address->id])->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client, Address $address)
    {
      try {
          $address->delete();
          return redirect()->route('profile')->with('success',('destroyed'));
      } catch (\Exception $e) {
          return redirect()->route('profile')->with('error',$e->getMessage());
      }
    }
}
