@extends('layouts.mainDiyorAdmin')
@section('content')
{{--    <div class="col-md-12">
        <div class="col-md-12">
            <h3 style="text-align: center">Туманлар</h3>
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
                <th scope="col" style="text-align: center">Туман номи</th>
                <th scope="col" style="text-align: center">Вилоят номи</th>
                <th scope="col" style="text-align: center"></th>
                <th scope="col" style="text-align: center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($districts as $key => $district)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$district->name}}</td>
                    <td>{{$district->region->name}}</td>
                    <td><a href="{{route('districts.edit', $district->id)}}" style="align-items: center" class="fa fa-pencil"></a></td>
                    <td><form action="{{route('districts.destroy', $district->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Rostdan ham {{$district->name}} o`chirmoqchimisiz?')"><i class="fa fa-trash"></i></button></div>
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{route('districts.create')}}" class="btn btn-primary">Янги қўшиш</a>
    </div>--}}

<div class="container-fluid p-5">
    <div class="col-12 px-0 table-box">
        <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
            <ul class="d-flex">
                <li class="col px-0 mx-3 table-top-panel-items {{--active--}}">
                    <a href="{{route('regions.index')}}" class="text-decoration-none table-top-panel-items-link">Вилоятлар</a>
                </li>
                <li class="col px-0 mx-3 table-top-panel-items {{route('districts.index') ? 'active' : ''}}">
                    <a href="{{route('districts.index')}}" class="text-decoration-none table-top-panel-items-link ">Туманлар</a>
                </li>
            </ul>


            <a href="{{route('districts.create')}}" type="button" class="btn adding-button">
                Янги кушиш <i class="fa fa-plus ml-2 mt-1"></i>
            </a>
        </div>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="lightblue-color w-2" scope="col">#</th>
                    <th colspan="2" class="darkblue-color">Туман номи</th>
                    <th colspan="2" class="darkblue-color">Вилоят номи</th>
                </tr>
                </thead>
                <tbody>
                @foreach($districts as $key => $district)
                    <tr>
                        <th class="lightblue-color w-2" scope="row">{{++$key}}</th>
                        <td class="darkblue-color">{{$district->name}}</td>
                        <td class="darkblue-color">{{$district->region->name}}</td>
                        <td class="darkblue-color d-flex align-items-center justify-content-end">
                            <a href="{{route('districts.edit', $district->id)}}" class="btn btn-edit mr-3" type="button">
                                <img src="{{asset('/assets/diyor/images/icon-create.svg')}}" alt="svg">
                            </a>
{{--                            <a href="#" class="btn btn-delete focus-none" type="button">
                                <img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg">
                            </a>--}}
                            <form action="{{route('districts.destroy', $district->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete focus-none" type="submit" onclick="return confirm('Rostdan ham {{$district->name}} o`chirmoqchimisiz?')"><img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg"></button>
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