@extends('layouts.mainDiyorAdmin')
@section('content')
    <div class="container-fluid p-5">
        <div class="col-12 px-0 table-box">
            <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                <ul class="d-flex">
                    <li class="col px-0 mx-3 table-top-panel-items {{route('courses.index') ? 'active' : ''}}">
                        <a href="{{route('courses.index')}}" class="text-decoration-none table-top-panel-items-link">Қисқа мудатли Ўқув курслари рўйхати</a> |
                        <a href="{{route('malaka')}}" class="text-decoration-none table-top-panel-items-link">Малака ошириш Ўқув курслари рўйхати</a>
                    </li>
                </ul>
                <a href="{{route('courses.create')}}" type="button" class="btn adding-button">
                    Янги кушиш <i class="fa fa-plus ml-2 mt-1"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th colspan="2" class="darkblue-color">Ўқув курс номи</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $key => $course)
                        <tr>
                            <th class="lightblue-color w-2" scope="row">{{++$key}}</th>
                            <td class="darkblue-color">{{$course->name}}</td>
                            <td class="darkblue-color d-flex align-items-center justify-content-end">
                                <a href="{{route('courses.edit', $course->id)}}" class="btn btn-edit mr-3" type="button">
                                    <img src="{{asset('/assets/diyor/images/icon-create.svg')}}" alt="svg">
                                </a>
                                <form action="{{route('courses.destroy', $course->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete focus-none" type="submit" onclick="return confirm('Rostdan ham {{$course->name}} o`chirmoqchimisiz?')"><img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg"></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection