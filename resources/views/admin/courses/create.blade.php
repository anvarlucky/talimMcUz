@extends('layouts.mainDiyorAdmin')
@section('content')
    <div class="container">
        {!! Form::open(['route' => 'courses.store','method' => 'post']) !!}
        @include('admin.courses._form')
        <button type="submit" class="btn adding-button ml-3">Сақлаш</button>
        {!! Form::close() !!}
    </div>
@endsection