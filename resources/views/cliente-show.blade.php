@extends('master')
@section('title', 'Cliente')
@section('content')
    <div class="row">
        <div class="offset-lg-3 col-lg-6">
            <clientes-show id="{{ $id }}"/>
        </div>
    </div>
@endsection