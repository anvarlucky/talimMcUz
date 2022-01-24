@extends('layouts.mainDiyor')
@section('content')
    @if(session('message'))
        <div class="alert alert-danger">
            {{session('message')}}
        </div>
    @endif
    <div class="container-fluid p-5">
        <div class="col-md-12 px-0 table-box">
            <div class="table-top-panel border-bottom d-flex align-items-center justify-content-between px-5 pt-5 pb-4">
                <p class="account-title mb-2">Ўқув курсларида иштирок этаётган тингловчи ҳақида маълумот</p>
            </div>

            <div class="edit-container form-blue min-vh-75 d-flex justify-content-center py-5">
                <div class="col-md-9">
                    {!! Form::open(['route' => ['students.update',$student->id],'method' => 'put','files'=>true, 'class' => 'row']) !!}
                    <div class="col-md-5 mr-4">
                        <div class="form-group">
                            <label for="Surname">Фамилия</label>
                            {{Form::text('s_name', $student->s_name??null, ['class' => 'form-control', 'id' => 'Surname','readonly'])}}
                        </div>
                        <div class="form-group">
                            <label for="name">Исм</label>
                            {{Form::text('f_name',$student->f_name??null, ['class' => 'form-control', 'id' => 'name','readonly'])}}
                        </div>
                        <div class="form-group">
                            <label for="Sharif">Шариф</label>
                            {{Form::text('l_name',$student->l_name??null, ['class' => 'form-control', 'id' => 'Sharif','readonly'])}}
                        </div>
                        <div class="form-group w-50">
                            <label for="birthday">Тўғилган санаси:</label>
                            {{Form::date('birthday', $student->birthday??null,['class' => 'form-control','id'=> 'birthday','readonly'])}}
                        </div>
                        <div class="form-group">
                            <label for="address">Яшаш манзили:</label>
                            {{Form::text('address',$student->address??null, ['class' => 'form-control', 'id' => 'address','readonly'])}}
                        </div>
                        <div class="form-group">
                            <label for="curse">Ўқув курси номи:</label>
                            {{Form::select('course_id', [__(' ')]+Arr::pluck($courses,'name','id'),$student->course_id??null, ['class' => 'form-control', 'id'=>'curse','readonly'])}}
                        </div>
                        <div class="form-group">
                            <label for="status">Ўқув курс тури:</label>
                            {{Form::select('status_course', [''=>'Танланг','1' => 'Қисқа муддатли', '2' => 'Малака ошириш'], $student->status_course??null,['class' => 'form-control','id' => 'status','readonly'])}}
                        </div>
                    </div>
                    <div class="col-md-5 ml-4">
                        <div class="form-group">
                            <label for="number-one">Қабул қилингалиги тўғрисидаги бўйруқ рақами:</label>
                            {{Form::text('entering_number',$student->entering_number??null, ['class' => 'form-control', 'id' => 'number-one','readonly'])}}
                        </div>
                        <div class="form-group w-50">
                            <label for="data-one" class="text-nowrap">Қабул қилингалиги тўғрисидаги бўйруқ
                                санаси:</label>
                            {{Form::date('entering_date',$student->entering_date??null, ['class' => 'form-control', 'id' => 'data-one','readonly'])}}
                        </div>
                        <div class="form-group w-50">
                            <label for="data-two" class="text-nowrap">Ўқув курси бошланган сана:</label>
                            {{Form::date('starting_date', $student->starting_date??null,['class' => 'form-control', 'id' => 'data-two','readonly'])}}
                        </div>
                        <div class="form-group">
                            <label for="select-one">Таълим муассаси номи:</label>
                            {{Form::select('college_id', [__(' ')]+Arr::pluck($colleges,'name','id'),$student->college_id??null, ['class' => 'form-control','id'=>'select-one' ,'readonly'])}}
                        </div>
                        <div class="form-group d-flex align-items-end justify-content-between">
                            <div class="file-path-wrapper col-md-8 pl-md-0">
                                <label for="file">Расмингизни юкланг (3х4):</label>
                                <label for="file" id="file-span"
                                       class="file-path span-input-file form-control validate w-100 mb-0"
                                       type="text" readonly></label>
                                {{Form::file('photo', ['class' => 'd-none file-id', 'id' => 'file','readonly'])}}
                            </div>
                            <label class="btn file-btn waves-effect btn-sm float-left mb-0 col-md-4 pr-md-0"
                                   for="file">
                                <span>Файл танланг</span>
                            </label>
                        </div>
                        <div class="form-group d-flex align-items-end justify-content-between">
                            <div class="file-path-wrapper col-md-8 pl-md-0">
                                <label for="file-1" class="text-nowrap">Бўйруқ нусхасини юкланг (jpg/jpeg/pdf):</label>
                                <label for="file-1" id="file-span-1"
                                       class="file-path span-input-file form-control validate w-100 mb-0"
                                       type="text" readonly></label>
                                {{Form::file('order_photo', ['class' => 'd-none file-id', 'id' => 'file-1','readonly'])}}
                            </div>
                            <label class="btn file-btn waves-effect btn-sm float-left mb-0 col-md-4 pr-md-0"
                                   for="file-1">
                                <span>Файл танланг</span>
                            </label>
                        </div>


                    </div>
                    <div class="col-md-5 mr-4">
                        <div class="form-group">
                            <label for="status">Статус:</label>
                            {{Form::select('status', [''=>'Танланг','2' => 'Битирган', '3' => 'Четлатилган'], $student->status??null,['class' => 'form-control','id' => 'status'])}}
                        </div>

                        <div class="form-group">
                            <label for="end-number" class="text-nowrap">Тамомланганлиги тўғрисидаги бўйруқ рақами/Четлатилганлик тўғрисидаги бўйруқ рақами:</label>
                            {{Form::text('finishing_number', $student->finishing_number??null, ['class' => 'form-control', 'id' => 'end-number'])}}
                        </div>

                        <div class="form-group">
                            <label for="sertificat-number" class="text-nowrap">Сертификат рақами/Четлатилганлик рақами:</label>
                            {{Form::text('certificate_number', $student->certificate_number??null, ['class' => 'form-control', 'id' => 'sertificat-number'])}}
                        </div>

                    </div>
                    <div class="col-md-5 ml-4">
                        <div class="form-group w-50">
                            <label for="end-curse-date">Ўқув курси тугаган сана/Четлатилганлик санаси:</label>
                            {{Form::date('finishing_data', $student->finishing_data??null, ['class' => 'form-control', 'id' => 'end-curse-date'])}}
                        </div>



                        <div class="form-group w-50">
                            <label for="start-curse-date">Сертификат олинган сана/Четлатилганлик санаси:</label>
                            {{Form::date('certificate_date', $student->certificate_date??null, ['class' => 'form-control', 'id' => 'start-curse-date'])}}
                        </div>

                        <div class="form-group d-flex align-items-end justify-content-between">
                            <div class="file-path-wrapper col-md-8 pl-md-0">
                                <label for="file-2" class="text-nowrap">Сертификатни юкланг (jpg/jpeg/pdf)/Четлатилганлик тўғрисидаги буйруқ:</label>
                                <label for="file-2" id="file-span-2"
                                       class="file-path span-input-file form-control validate w-100 mb-0"
                                       type="text" ></label>
                                {{Form::file('certificate_photo', ['class' => 'd-none file-id', 'id' => 'file-2'])}}
                            </div>
                            <label class="btn file-btn waves-effect btn-sm float-left mb-0 col-md-4 pr-md-0"
                                   for="file-2">
                                <span>Файл танланг</span>
                            </label>
                        </div>


                        <div class="d-flex align-items-center justify-content-end mt-5">
                            <button type="reset" class="btn bg-transparent darkblue-color">Бекор килиш</button>
                            <button type="submit" class="btn btn-success mx-md-3 px-4">Тасдиклаш</button>
                            <button type="submit" class="btn darkblue-bg text-white px-4">Саклаш</button>
                        </div>
                    </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

