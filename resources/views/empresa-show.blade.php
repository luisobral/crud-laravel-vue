@extends('master')
@section('title', 'Empresa')
@section('content')
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <empresas-show id="{{ $id }}"/>
        </div>
    </div>
@endsection