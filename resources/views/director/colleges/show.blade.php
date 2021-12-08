@extends('layouts.mainAdmin')
@section('content')
    <div class="container-fluid p-5">
        <div class="col-12 px-0 table-box">
            @if($studentsFinished != 0)
            <p>Тамомлаганлар: {{$studentsFinished}}</p>
            @else
                <p>Тамомлаганлар: -</p>
            @endif
            @if($studentsStudy != 0)
            <p>Ўқиётганлар: {{$studentsStudy}}</p>
            @else
                <p>Ўқиётганлар: -</p>
            @endif
            @if($studentsOut != 0)
            <p>Четлатилганлар: {{$studentsOut}}</p>
            @else
                <p>Четлатилганлар: -</p>
            @endif
            @if($students != 0)
                    <p><b>Умумий сони:</b> {{$students}}</p>
            @else
                    <p><b>Умумий сони:</b> -</p>
            @endif
        </div>
    </div>
@endsection