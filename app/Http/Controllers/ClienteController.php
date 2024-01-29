<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Filters\ClienteFilters;
use App\Http\Resources\ClienteCollection;
use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Filters\ClienteFilters
     * @return \Illuminate\Http\Response
     */
    public function index(ClienteFilters $filters)
    {
        $cliente = Cliente::filter($filters)->get();
        return new ClienteCollection($cliente);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreClienteRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClienteRequest $request)
    {
        $recnum = Cliente::all()->last();
        $recnum = is_null($recnum)? 1 : $recnum->id + 1;
        $cliente = (new Cliente);
        $cliente->recnum = $recnum;
        $cliente->fill($request->all());
        $cliente->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return response()->json($cliente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateClienteRequest  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClienteRequest $request, Cliente $cliente)
    {
        $cliente->fill($request->all());
        $cliente->update();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
    }
}
