<?php

namespace App\Http\Controllers;

use App\Client;
use App\Product;
use App\Rent;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rents = Rent::orderBy('id', 'desc')->paginate();

        return view('rents.index', compact('rents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        $products = Product::all();

        return view('rents.create', compact('clients', 'products'));
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
            $attributes['start_at'] = Carbon::createFromFormat('d/m/Y', $request->start_at);
            $attributes['end_at'] = Carbon::createFromFormat('d/m/Y', $request->end_at);

            // cria pedido
            $rent = Rent::create($attributes);

            // relaciona os produtos com o pedido
            $products = is_null($attributes['products']) ? [] : $attributes['products'];
            $rent->products()->sync($products);

            return redirect()->route('rents.show', ['id' => $rent->id])->with('success', ('created'));
        } catch (\Exception $e) {
            return redirect()->route('rents.show', ['id' => $rent->id])->with('error', $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function show(Rent $rent)
    {
        return view('rents.show', compact('rent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function edit(Rent $rent)
    {
        return view('rents.edit', compact('rent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rent $rent)
    {
        try {
            $rent->update($request->all());
            return redirect()->route('rents.show', ['id' => $rent->id])->with('success', ('updated'));
        } catch (\Exception $e) {
            return redirect()->route('rents.show', ['id' => $rent->id])->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Rent  $rent
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rent $rent)
    {
        try {
            $rent->delete();
            return redirect()->route('rents.index')->with('success',('destroyed'));
        } catch (\Exception $e) {
            return redirect()->route('rents.index')->with('error',$e->getMessage());
        }
    }
}
