<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Filters\EmpresaFilters;
use App\Http\Resources\EmpresaCollection;
use App\Http\Requests\StoreEmpresaRequest;
use App\Http\Requests\UpdateEmpresaRequest;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Filters\EmpresaFilters
     * @return \Illuminate\Http\Response
     */
    public function index(EmpresaFilters $filters)
    {
        $empresas = Empresa::filter($filters)->get();
        return new EmpresaCollection($empresas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreEmpresaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmpresaRequest $request)
    {
        $recnum = Empresa::all()->last();
        $recnum = is_null($recnum)? 1 : $recnum->id + 1;
        $empresa = (new Empresa);
        $empresa->recnum = $recnum;
        $empresa->fill($request->all());
        $empresa->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        return response()->json($empresa);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Requests\UpdateEmpresaRequest  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmpresaRequest $request,Empresa $empresa)
    {
        $empresa->fill($request->all());
        $empresa->update();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        $empresa->delete();
    }
}
