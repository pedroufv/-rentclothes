<?php

namespace App\Http\Controllers;

use App\Address;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $addresss = Address::orderBy('id', 'desc')->paginate();

      return view('addresss.index', compact('addresss'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $clients = Client::all();
      $staffs = Staff::all();

      return view('addresss.create', compact('clients', 'staffs'));
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
          // trata os dados da requisicao
          $attributes = $request->all();
          $attributes['user_id'] = Auth::user()->id;

          // relaciona os produtos com o pedido
          //falta relacionar o endereço com o cliente e funcionário

          return redirect()->route('addresss.show', ['id' => $addresss->id])->with('success', ('created'));
      } catch (\Exception $e) {
          return redirect()->route('adrresss.show', ['id' => $addresss->id])->with('error', $e->getMessage());
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
      $addresss = Address::all();

      return view('addresss.show', compact('adrress', 'clients', 'staffs',));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
      $clients = Client::all();
      $staffs = Staff::all();

      return view('adrresss.edit', compact('addresss', 'clients', 'staffs'));
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
          return redirect()->route('addresss.show', ['id' => $address->id])->with('success', ('updated'));
      } catch (\Exception $e) {
          return redirect()->route('addresss.show', ['id' => $address->id])->with('error', $e->getMessage());
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
          return redirect()->route('addresss.index')->with('success',('destroyed'));
      } catch (\Exception $e) {
          return redirect()->route('addresss.index')->with('error',$e->getMessage());
      }
    }
}
