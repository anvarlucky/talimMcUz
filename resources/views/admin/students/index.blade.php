@extends('layouts.mainDiyorAdmin')
@section('content')
{{--    <p>{{$students}}</p>--}}{{--

    <div class="col-md-12">
        <div class="col-md-12">
            <h3 style="text-align: center">Талабалар</h3>
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
                <th scope="col" style="text-align: center">Талаба Ф.И.Ш</th>
                <th scope="col" style="text-align: center">Туғилган куни</th>
                <th scope="col" style="text-align: center">Манзил</th>
                <th scope="col" style="text-align: center">Коллежи</th>
                <th scope="col" style="text-align: center">Масул</th>
                <th scope="col" style="text-align: center"></th>
                <th scope="col" style="text-align: center"></th>
            </tr>
            </thead>
            <tbody>
            @foreach($students as $key => $student)
                <tr>
                    <th scope="row">{{++$key}}</th>
                    <td>{{$student->s_name}} {{$student->f_name}} {{$student->l_name}}</td>
                    <td>{{$student->birthday}}</td>
                    <td>{{$student->address}}</td>
                    <td>{{$student->college->name}}</td>
                    <td>{{$student->college->user->name}}</td>
                    <td><a href="{{route('sts.edit', $student->id)}}" style="align-items: center" class="fa fa-pencil"></a></td>
                    <td><form action="{{route('sts.destroy', $student->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="btn-group btn-group-sm" role="group"><button class="btn btn-danger" type="submit" onclick="return confirm('Rostdan ham {{$student->f_name}} o`chirmoqchimisiz?')"><i class="fa fa-trash"></i></button></div>
                        </form></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
--}}{{--
    <a href="{{route('students.create')}}" class="btn btn-primary">Янги қўшиш</a>
--}}{{--
    </div>--}}


<div class="container-fluid p-5">
    <div class="col-12 px-0 table-box">
        <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
            <ul class="d-flex">
                <li class="col px-0 mx-3 table-top-panel-items {{route('sts.index') ? 'active' : ''}}">
                    <a href="{{route('sts.index')}}" class="text-decoration-none table-top-panel-items-link">Талабалар</a>
                </li>
            </ul>


        {{--    <a href="{{route('sts.create')}}" type="button" class="btn adding-button">
                Янги кушиш <i class="fa fa-plus ml-2 mt-1"></i>
            </a>--}}
        </div>


        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th class="lightblue-color w-2" scope="col">#</th>
                    <th class="darkblue-color">Талаба Ф.И.Ш</th>
                    <th class="darkblue-color">Туғилган куни</th>
                    <th class="darkblue-color">Манзил</th>
                    <th class="darkblue-color">Коллежи</th>
                    <th class="darkblue-color"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($students as $key => $student)
                    <tr>
                        <th class="lightblue-color w-2" scope="row">{{++$key}}</th>
                        <td class="darkblue-color">{{$student->s_name}} {{$student->f_name}} {{$student->l_name}}</td>
                        <td class="darkblue-color">{{$student->birthday}}</td>
                        <td class="darkblue-color">{{$student->address}}</td>
                        <td class="darkblue-color">{{$student->college->name}}</td>
                        <td class="darkblue-color d-flex align-items-center justify-content-end">
                            <a href="{{--{{route('sts.edit', $student->id)}}--}}#" class="btn btn-edit mr-3" type="button">
                                <img src="{{asset('/assets/diyor/images/icon-create.svg')}}" alt="svg">
                            </a>
                            <a href="#" class="btn btn-delete focus-none" type="button">
                                <img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg">
                            </a>
{{--                            <form action="{{route('students.destroy', $student->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-delete focus-none" type="submit" onclick="return confirm('Rostdan ham {{$student->name}} o`chirmoqchimisiz?')"><img src="{{asset('/assets/diyor/images/icon-delete.svg')}}" alt="svg"></button>
                            </form>--}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
@endsection