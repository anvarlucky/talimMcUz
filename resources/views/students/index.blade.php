@extends('layouts.mainDiyor')
@section('content')
        <div class="container-fluid p-5">
            <div class="d-flex justify-content-between align-items-center">
                <p class="title-list">Қисқа муддатли ўқув курсларида иштирок этаётган тингловчилар рўйхати</p>
                <form action="{{route('students.search')}}" method="post" class="input-group  search-input col-4 mb-3">
                        @csrf
                    <input type="text" name="search" class="form-control focus-none border-right-0" placeholder="Қидирув"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="input-group-text"><i class="fa fa-search" type="button"></i></button>
                    </div>
                </form>
            </div>

            <div class="col-12 px-0 table-box">
                <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                    <ul class="d-flex">
                        <li class="col px-0 mx-3 table-top-panel-items {{--active--}} {{route('students.index') ? 'active' : ''}}">
                            <a href="{{route('students.index')}}" class="text-decoration-none table-top-panel-items-link">Ўқиётганлар</a>
                        </li>
                        <li class="col px-0 mx-3 table-top-panel-items">
                            <a href="{{route('certified')}}" class="text-decoration-none table-top-panel-items-link">Тамомлаганлар</a>
                        </li>
                        <li class="col px-0 mx-3 table-top-panel-items">
                            <a href="{{route('ticket.index')}}" class="text-decoration-none table-top-panel-items-link">Ticket</a>
                        </li>
                    </ul>


                    <a href="{{route('students.create')}}" class="btn adding-button">
                        Янги кушиш <i class="fa fa-plus ml-2 mt-1"></i>
                    </a>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="lightblue-color w-2" scope="col">#</th>
                            <th class="darkblue-color text-center text-nowrap align-top">Ф.И.Ш</th>
                            <th class="darkblue-color text-center text-nowrap align-top">Вилоят</th>
                            <th class="darkblue-color text-center text-nowrap align-top">Туман/Шахар</th>
                            <th class="darkblue-color text-center text-nowrap align-top">Сертификат рақами</th>
                            <th class="darkblue-color text-center align-top">Сертификат олинган сана</th>
                            <th class="darkblue-color text-center text-nowrap align-top">Таълим муассаси номи</th>
                            <th class="darkblue-color text-center align-top">Қабул қилинганлиги бўйруқ рақами ва санаси
                            </th>
                            <th class="darkblue-color text-center align-top">Тамомланганлиги тўғрисидаги бўйруқ ва
                                санаси
                            </th>
                            <th class="darkblue-color text-center text-nowrap align-top">Статус</th>
                            <th class="darkblue-color text-center text-nowrap align-top">Ўзгартириш</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($students as $key => $student)
                        <tr>
                            <th class="lightblue-color w-2 align-middle" scope="row">{{++$key}}</th>
                            <td class="darkblue-color text-center text-nowrap align-middle"><a href="{{route('student',$student->id)}}">{{$student->s_name}} {{$student->f_name}} {{$student->l_name}}</a></td>
                            <td class="darkblue-color text-center text-nowrap align-middle">{{$student->college->district->region->name}}</td>
                            <td class="darkblue-color text-center text-nowrap align-middle">{{$student->address}}</td>
                            @if($student->certificate_number != null)
                            <td class="darkblue-color text-center text-nowrap align-middle"><a href="#">{{$student->certificate_number}}</a></td>
                            @else
                            <td class="darkblue-color text-center text-nowrap align-middle">{{$student->certificate_number}}</td>
                            @endif
                            <td class="darkblue-color text-center text-nowrap align-middle">{{\Carbon\Carbon::parse($student->certificate_date)->format('d-m-Y')}}</td>
                            <td class="darkblue-color text-center text-nowrap align-middle">{{$student->college->name}}
                            </td>
                            <td class="darkblue-color text-center text-nowrap align-middle"><b><a href="{{route('order',$student->id)}}">{{$student->entering_number}} {{\Carbon\Carbon::parse($student->entering_date)->format('d-m-Y')}}</a></b></td>
                            <td class="darkblue-color text-center text-nowrap align-middle"><b>{{$student->finishing_number}}</b><br/>{{$student->finishing_date}}</td>
                            <td class="darkblue-color text-center text-nowrap align-middle">@if($student->status==1){{"Ўқиш жараёнида"}}
                                @elseif($student->status==2){{"Битирган"}}
                                @else{{"Четлатилган"}}
                                @endif</td>
                            <td class="darkblue-color d-flex align-items-center justify-content-end">
                                <a href="{{route('students.edit', $student->id)}}" class="btn btn-outline-primary mr-3 text-nowrap">Сертификатни юклаш</a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <br/>
{{--
            {{$students->render()}}
--}}
        </div>
@endsection