@extends('layouts.mainDiyorAdmin')
@section('content')
    <div class="container">
        {!! Form::open(['route' => ['districts.update',$district->id],'method' => 'put']) !!}
        @include('admin.districts._form')
        <button type="submit" class="btn adding-button ml-3">Сақлаш</button>
        {!! Form::close() !!}
    </div>
@endsection