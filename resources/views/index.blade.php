@extends('layouts.main')
@section('content')
    <div class="col-md-12">
        <div class="col-md-12">
            <h3 style="text-align: center">Қисқа муддатли ўқув курсларида иштирок этаётган тингловчилар рўйхати</h3>|
            {{--<a href="/">Chiqish</a>--}}
            <form action="{{route('validatsiya.search')}}" method="post">
                @csrf
                <input type="text" name="search" class="form-group col-md-8">
                <button type="submit" class="btn btn-primary col-md-3">Қидириш</button>
            </form>
            {{ session('status') }}
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
                <th scope="col" style="text-align: center">Ф.И.Ш</th>
                <th scope="col" style="text-align: center">Вилоят</th>
                <th scope="col" style="text-align: center">Туман/шаҳар</th>
                <th scope="col" style="text-align: center">Сертификат рақами</th>
                <th scope="col" style="text-align: center">Сертификат олинган сана</th>
                <th scope="col" style="text-align: center">Таълим муассаси номи</th>
                {{--<th>Расм</th>--}}
                <th scope="col" style="text-align: center">Қабул қилинганлиги бўйруқ рақами ва санаси</th>
                <th scope="col" style="text-align: center">Тамомланганлиги тўғрисидаги бўйруқ ва санаси</th>
                <th scope="col" style="text-align: center">Статус</th>
                <th scope="col" style="text-align: center">Ўзгартириш</th>
            </tr>
            </thead>
            <tbody>
            @foreach($validatsiyas as $key => $validatsiya)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$validatsiya->fullname}}</td>
                    <td>{{$validatsiya->courseRegion}}</td>
                    <td>{{$validatsiya->courseDistrict}}</td>
                    <td>{{$validatsiya->certNumber}}</td>
                    <td>{{$validatsiya->certDate}}</td>
                    <td>{{$validatsiya->college}}</td>
                    {{--<td><img src="/storage/validatsiya/photo/{{$validatsiya->photo}}" width = "100px"></td>--}}
                    <td><b>{{$validatsiya->enteringNumber}}</b><br/>{{$validatsiya->startDay}}</td>
                    <td><b>{{$validatsiya->exitingNumber}}</b><br/>{{$validatsiya->endDay}}</td>
                    <td>@if($validatsiya->status==1){{"Ўқиш жараёнида"}}
                        @elseif($validatsiya->status==2){{"Битирган"}}
                        @else{{"Четлатилган"}}
                        @endif</td>
                    <td>
                        @if($validatsiya->status != 2)
                            <a href="{{route('validatsiya.edit', $validatsiya->id)}}" class="fa fa-pencil"></a>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <a href="{{route('validatsiya.create')}}" class="btn btn-primary">Янги қўшиш</a>
    </div>
@endsection