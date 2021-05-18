@extends('layouts.mainDiyor')
@section('content')
    <div class="container col-12">
        {!! Form::open(['route' => 'ticket.store','method' => 'post','files'=>true]) !!}
        @csrf
            {!! Form::hidden('user_id', $user->id) !!}
            {!! Form::hidden('fullname', $user->name) !!}
            {!! Form::hidden('project_id', 1) !!}
        <div class="form-group col-md-12">
            <h2 align="center">Ticket yaratish oynasi</h2>
            <label>Darajasi:</label>
            {{Form::select('priority', [''=>'','1' => 'Oddiy', '2' => 'O`rtacha muhum', '3' => 'Juda muhum'], $ticet->priority??null,['class' => 'form-control'])}}
            <br><label>Kategoriyani tanlang:</label>
            {{Form::select('category_id', [__(' ')]+Arr::pluck($categories,'name_uz','id'),$ticket->category_id??null, ['class' => 'form-control', 'id'=>'curse'])}}
            <br/>
            <label>Sarlavha</label>
            {{Form::text('title', $ticket->title??null, ['class' => 'form-control'])}}
            <br>
            <label>Muammo</label>
            {{Form::textarea('description', $ticket->description??null, ['class' => 'form-control'])}}
            <br>
            <label>Muammo rasmi</label>
            {{Form::file('screenshot', $ticket->screenshot??null, ['class' => 'form-control'])}}
            <br>
        </div>
        <button type="submit" class="btn btn-primary ml-3">Saqlash</button>
        {!! Form::close() !!}
    </div>
@endsection