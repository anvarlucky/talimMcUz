@extends('layouts.mainAdmin')
@section('content')
{{--    <div class="col-md-12">
        <div class="col-md-12">
            <h3 style="text-align: center">Коллежлар</h3>
        </div>
    </div>
    <div class="table-responsive">
        <div class="col-md-12">
            <!--  -->
        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col" style="text-align: center">Коллеж номи</th>
                <th scope="col" style="text-align: center">Туман номи</th>
                <th scope="col" style="text-align: center">Фойдаланувчи номи</th>
                <th scope="col" style="text-align: center">Коллеж коди</th>
                <th scope="col" style="text-align: center"></th>
                <th scope="col" style="text-align: center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($colleges as $key => $college)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$college->name}}</td>
                    <td>{{$college->district->name}}</td>
                    <td>{{$college->user->name}}</td>
                    <td>{{$college->code}}</td>
                    <td><a href="{{route('colleges.edit', $college->id)}}" style="align-items: center" class="fa fa-pencil"></a></td>
                    <td><form action="{{route('colleges.destroy', $college->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Rostdan ham {{$college->name}} o`chirmoqchimisiz?')"><i class="fa fa-trash"></i></button></div>
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{route('colleges.create')}}" class="btn btn-primary">Янги қўшиш</a>
    </div>--}}

    <div class="container-fluid p-5">
        <div class="col-12 px-0 table-box">
            <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                <ul class="d-flex">
                    <li class="col px-0 mx-3 table-top-panel-items {{route('cols.index') ? 'active' : ''}}">
                        <a href="{{route('cols.index')}}" class="text-decoration-none table-top-panel-items-link">Коллежлар</a>
                    </li>
                </ul>

            </div>


            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th class="darkblue-color">Коллеж номи</th>
                        <th class="darkblue-color">Туман номи</th>
                        <th class="darkblue-color">Фойдаланувчи номи</th>
                        <th class="darkblue-color">Коллеж коди</th>
                        <th class="darkblue-color"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($colleges as $key => $college)
                    <tr>
                        <th class="lightblue-color w-2" scope="row">{{++$key}}</th>
                        @if(Auth::user()->role=='Direktor')
                            <td class="darkblue-color"><a href="{{route('cols.show', $college->id)}}">{{$college->name}}</a></td>
                        @else
                        <td class="darkblue-color">{{$college->name}}</td>
                        @endif
                        <td class="darkblue-color">{{$college->district->name}}</td>
                        <td class="darkblue-color">{{$college->user->name}}</td>
                        <td class="darkblue-color">{{$college->code}}</td>
                        @if(Auth::user()->role == 'Admin')
                        <td class="darkblue-color d-flex align-items-center justify-content-end">
                            <a href="{{route('colleges.edit', $college->id)}}" class="btn btn-edit mr-3" type="button">
                                <img src="{{asset('/assets/diyor/images/icon-create.svg')}}" alt="svg">
                            </a>
{{--                            <a href="#" class="btn btn-delete focus-none" type="button">
                                <img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg">
                            </a>--}}
                            <form action="{{route('colleges.destroy', $college->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete focus-none" type="submit" onclick="return confirm('Rostdan ham {{$college->name}} o`chirmoqchimisiz?')"><img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg"></button>
                            </form>
                        </td>
                        @endif
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection