@extends('layouts.mainDiyor')
@section('content')
<div class="panel-top">
    <div class="panel-top-fixed d-flex align-items-center justify-content-between py-2 px-5">
        <a href="/"><p class="darkblue-color font-weight-bold text-nowrap mb-0 mr-1">Қисқа муддатли ўқув курслари </p></a>|
        <a href="{{route('profdev')}}" class="darkblue-color font-weight-bold text-nowrap mb-0 ml-1"> Малака ошириш ўқув курслари</a>

        <div class="panel-top-items-box">

            <img src="{{asset('/assets/diyor/images/notification-icon.svg')}}" alt="svg">

            <div type="button" class="dropdown show user-cabinet dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">{{Auth::user()->name}}</a>
                    <a class="dropdown-item" href="#">Созламалар</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="{{route('logout')}}">Чиқиш</a>
                </div>
            </div>
        </div>

    </div>
    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif
</div>
    <div class="container-fluid p-5">
        <div class="col-md-12 px-0 table-box">
            <div class="table-top-panel border-bottom d-flex align-items-center justify-content-between px-5 pt-5 pb-4">
                <p class="account-title mb-2">Ўқув курсларида иштирок этаётган тингловчи ҳақида
                    маълумот</p>
            </div>

            <div class="edit-container form-blue min-vh-75 d-flex justify-content-center py-5">
                <div class="col-md-9">
                        {!! Form::open(['route' => 'students.store','method' => 'post','files'=>true, 'class' => 'row']) !!}
                        <div class="col-md-5 mr-4">
                            <div class="form-group">
                                <label for="Surname">Фамилия</label>
                                {{Form::text('s_name', $student->s_name??null, ['class' => 'form-control', 'id' => 'Surname'])}}
                            </div>
                            <div class="form-group">
                                <label for="name">Исм</label>
                                {{Form::text('f_name',$student->f_name??null, ['class' => 'form-control', 'id' => 'name'])}}
                            </div>
                            <div class="form-group">
                                <label for="Sharif">Шариф</label>
                                {{Form::text('l_name',$student->l_name??null, ['class' => 'form-control', 'id' => 'Sharif'])}}
                            </div>
                            <div class="form-group w-50">
                                <label for="birthday">Туғилган санаси:</label>
                                {{Form::date('birthday', $student->birthday??null,['class' => 'form-control','id'=> 'birthday'])}}
                            </div>
                            <div class="form-group">
                                <label for="address">Яшаш манзили:</label>
                                {{Form::text('address',$student->address??null, ['class' => 'form-control', 'id' => 'address'])}}
                            </div>
                            <div class="form-group">
                                <label for="status">Ўқув курс тури:</label>
                                {{Form::select('status_course', [''=>'Танланг','1' => 'Қисқа муддатли', '2' => 'Малака ошириш'], $student->status_course??null,['class' => 'form-control','id' => 'status'])}}
                            </div>
                            <div class="form-group">
                                <label for="curse">Ўқув курси номи:</label>
                                {{Form::select('course_id', [__(' ')]+Arr::pluck($courses,'name','id'),$student->course_id??null, ['class' => 'form-control', 'id'=>'curse'])}}
                            </div>
                        </div>
                        <div class="col-md-5 ml-4">
                            <div class="form-group">
                                <label for="Surname">ЖШШИР</label>
                                {{Form::text('pnfl', $student->pnfl??null, ['class' => 'form-control', 'id' => 'pnfl'])}}
                            </div>
                            <div class="form-group">
                                <label for="number-one">Қабул қилингалиги тўғрисидаги бўйруқ рақами:</label>
                                {{Form::text('entering_number',$student->entering_number??null, ['class' => 'form-control', 'id' => 'number-one'])}}
                            </div>
                            <div class="form-group w-50">
                                <label for="data-one" class="text-nowrap">Қабул қилингалиги тўғрисидаги бўйруқ
                                    санаси:</label>
                                {{Form::date('entering_date',$student->entering_date??null, ['class' => 'form-control', 'id' => 'data-one'])}}
                            </div>
                            <div class="form-group w-50">
                                <label for="data-two" class="text-nowrap">Ўқув курси бошланган сана:</label>
                                {{Form::date('starting_date', $student->starting_date??null,['class' => 'form-control', 'id' => 'data-two'])}}
                            </div>
                            <div class="form-group">
                                <label for="select-one">Таълим муассаси номи:</label>
                                {{Form::select('college_id', [__(' ')]+Arr::pluck($colleges,'name','id'),$student->college_id??null, ['class' => 'form-control','id'=>'select-one', 'selected'])}}
                            </div>
                            <div class="form-group d-flex align-items-end justify-content-between">
                                <div class="file-path-wrapper col-md-8 pl-md-0">
                                    <label for="file">Расмингизни юкланг (3х4):</label>
                                    <label for="file" id="file-span"
                                           class="file-path span-input-file form-control validate w-100 mb-0"
                                           type="text"></label>
                                    {{Form::file('photo', ['class' => 'd-none file-id', 'id' => 'file'])}}
                                </div>
                                <label class="btn file-btn waves-effect btn-sm float-left mb-0 col-md-4 pr-md-0"
                                       for="file">
                                    <span>Файл танланг</span>
                                </label>
                            </div>
                            <div class="form-group d-flex align-items-end justify-content-between">
                                <div class="file-path-wrapper col-md-8 pl-md-0">
                                    <label for="file-1" class="text-nowrap">Бўйруқ нусхасини юкланг
                                        (jpg/jpeg/pdf):</label>
                                    <label for="file-1" id="file-span-1"
                                           class="file-path span-input-file form-control validate w-100 mb-0"
                                           type="text"></label>
                                    {{Form::file('order_photo', ['class' => 'd-none file-id', 'id' => 'file-1'])}}
                                </div>
                                <label class="btn file-btn waves-effect btn-sm float-left mb-0 col-md-4 pr-md-0"
                                       for="file-1">
                                    <span>Файл танланг</span>
                                </label>
                            </div>
                            <div class="d-flex align-items-center justify-content-end mt-5">
                                <button type="submit" class="btn darkblue-bg text-white px-4">Саклаш</button>
                            </div>
                        </div>
                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@endsection