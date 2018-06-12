<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $query = Client::orderBy('id', 'desc');

        $clients = $query->paginate();

         $sql = $query->toSql();

        return view('clients.index', compact('clients', 'sql'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clients.create');
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
          $client = Client::create($request->all());
          return redirect()->route('clients.show', ['id' => $client->id])->with('success', ('created'));
     } catch (\Exception $e) {
          return redirect()->route('clients.show', ['id' => $client->id])->with('error', $e->getMessage());
     }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Client $client)
    {
      try {
          $client->update($request->all());
          return redirect()->route('clients.show', ['id' => $client->id])->with('success', ('updated'));
      } catch (\Exception $e) {
          return redirect()->route('clients.show', ['id' => $client->id])->with('error', $e->getMessage());
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
      try {
          $client->delete();
          return redirect()->route('clients.index')->with('success',('destroyed'));
      } catch (\Exception $e) {
          return redirect()->route('clients.index')->with('error',$e->getMessage());
      }
    }
  }
