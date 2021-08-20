@extends('layouts.mainDiyor')
@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif
        <div class="container-fluid p-5">
            <div class="d-flex justify-content-between align-items-center">
                <p class="title-list">Қисқа муддатли ўқув курсларини тамомлаган тингловчилар рўйхати</p>

                <form action="{{route('students.search')}}" method="post" class="input-group  search-input col-4 mb-3">
                    @csrf
                    <input type="text" name="search" class="form-control focus-none border-right-0" placeholder="Қидирув"
                           aria-label="Recipient's username" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                </form>
            </div>

            <div class="col-12 px-0 table-box">
                <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                    <ul class="d-flex">
                        <li class="col px-0 mx-3 table-top-panel-items {{--active--}}">
                            <a href="{{route('students.index')}}" class="text-decoration-none table-top-panel-items-link">Ўқиётганлар</a>
                        </li>
                        <li class="col px-0 mx-3 table-top-panel-items {{route('certified') ? 'active' : ''}}">
                            <a href="{{route('certified')}}" class="text-decoration-none table-top-panel-items-link">Тамомлаганлар</a>
                        </li>
                    </ul>
                </div>


                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th class="lightblue-color w-2" scope="col">#</th>
                            <th class="darkblue-color text-center text-nowrap">Ф.И.Ш</th>
                            <th class="darkblue-color text-center text-nowrap">Вилоят</th>
                            <th class="darkblue-color text-center text-nowrap">Туман/ Шахар</th>
                            <th class="darkblue-color text-center text-nowrap">Сертификат рақами</th>
                            <th class="darkblue-color text-center text-nowrap">Сертификат олинган сана</th>
                            <th class="darkblue-color text-center text-nowrap">Таълим муассаси номи</th>
                            <th class="darkblue-color text-center text-nowrap">Қабул қилинганлиги бўйруқ рақами ва санаси
                            </th>
                            <th class="darkblue-color text-center text-nowrap">Тамомланганлиги тўғрисидаги бўйруқ ва
                                санаси
                            </th>
                            <th class="darkblue-color text-center text-nowrap">Статус</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($students as $key => $student)
                            <tr>
                                <th class="lightblue-color w-2 align-middle" scope="row">{{ ($students ->currentpage()-1) * $students ->perpage() + $loop->index + 1 }}</th>
                                <td class="darkblue-color text-center text-nowrap align-middle"><a href="{{route('student',$student->id)}}">{{$student->s_name}} {{$student->f_name}} {{$student->l_name}}</a></td>
                                <td class="darkblue-color text-center text-nowrap align-middle">{{$student->college->district->region->name}}</td>
                                <td class="darkblue-color text-center text-nowrap align-middle">{{$student->address}}</td>
                                @if($student->certificate_number != null)
                                    <td class="darkblue-color text-center text-nowrap align-middle"><a href="{{route('certificate',$student->id)}}">{{$student->certificate_number}}</a></td>
                                @else
                                    <td class="darkblue-color text-center text-nowrap align-middle">{{$student->certificate_number}}</td>
                                @endif
                                <td class="darkblue-color text-center text-nowrap align-middle">{{\Carbon\Carbon::parse($student->certificate_date)->format('d-m-Y')}}</td>
                                <td class="darkblue-color text-center text-nowrap align-middle">{{$student->college->name}}
                                </td>
                                <td class="darkblue-color text-center text-nowrap align-middle"><b><a href="{{route('order',$student->id)}}">{{$student->entering_number}} {{\Carbon\Carbon::parse($student->entering_date)->format('d-m-Y')}}</a></b></td>
                                <td class="darkblue-color text-center text-nowrap align-middle"><b>{{$student->finishing_number}}</b><br/>{{\Carbon\Carbon::parse($student->finishing_date)->format('d-m-Y')}}</td>
                                <td class="darkblue-color text-center text-nowrap align-middle">{{"Битирган"}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <br/>
            {{$students->render()}}
        </div>

@endsection