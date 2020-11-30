@extends('layouts.mainDiyorAdmin')
@section('content')
<div class="container-fluid p-5">
        <div class="col-12 px-0 table-box">
            <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                <ul class="d-flex">
                    <li class="col px-0 mx-3 table-top-panel-items {{--active--}} {{route('reg.index') ? 'active' : ''}}">
                        <a href="{{route('reg.index')}}" class="text-decoration-none table-top-panel-items-link">Вилоятлар</a>
                    </li>
                    <li class="col px-0 mx-3 table-top-panel-items">
                        <a href="{{route('dis.index')}}" class="text-decoration-none table-top-panel-items-link">Туманлар</a>
                    </li>
                </ul>


                <a href="{{route('reg.create')}}" type="button" class="btn adding-button">
                    Янги кушиш <i class="fa fa-plus ml-2 mt-1"></i>
                </a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th colspan="2" class="darkblue-color">Вилоят номи</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($regions as $key => $region)
                        <tr>
                            <th class="lightblue-color w-2" scope="row">{{++$key}}</th>
                            <td class="darkblue-color">{{$region->name}}</td>
                            <td class="darkblue-color d-flex align-items-center justify-content-end">
                                <a href="{{route('reg.edit', $region->id)}}" class="btn btn-edit mr-3" type="button">
                                    <img src="{{asset('/assets/diyor/images/icon-create.svg')}}" alt="svg">
                                </a>
                                <form action="{{route('reg.destroy', $region->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-delete focus-none" type="submit" onclick="return confirm('Rostdan ham {{$region->name}} o`chirmoqchimisiz?')"><img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg"></button>
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