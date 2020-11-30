@extends('layouts.mainDiyor')
@section('content')
        <div class="container-fluid p-5">
            <div class="col-md-12 px-0 table-box">
                <div class="table-top-panel border-bottom d-flex align-items-center justify-content-between px-5 pt-5 pb-4">
                    <p class="account-title mb-2">Қисқа муддатли ўқув курсларида иштирок этаётган тингловчи ҳақида
                        маълумот</p>
                </div>

                <div class="account-container min-vh-75 d-flex justify-content-center py-5">
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="account-photo">
                                    <img src="/storage/validation/photo/{{$student->photo}}" class="w-100" alt="png">
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="account-info">
                                    <ul class="mb-5 pb-3">
                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <p class="account-info-title">
                                                    Ф.И.Ш:
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="account-info-text">
                                                    {{$student->s_name}} {{$student->f_name}} {{$student->l_name}}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <p class="account-info-title">
                                                    Туғилган санаси:
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="account-info-text">
                                                    {{\Carbon\Carbon::parse($student->birthday)->format('d-m-Y')}}
                                                </p>
                                            </div>
                                        </li>
                                    </ul>

                                    <ul class="border-A5C9FF pt-4">
                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <p class="account-info-title">
                                                    Ўқув курси номи:
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="account-info-text">
                                                    {{$student->course->name}}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <p class="account-info-title">
                                                    Ўқув курси бошланган сана:
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="account-info-text">
                                                    {{\Carbon\Carbon::parse($student->starting_date)->format('d-m-Y')}}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <p class="account-info-title">
                                                    Сертификат рақами:
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="account-info-text">
                                                    {{$student->certificate_number}}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <p class="account-info-title">
                                                    Сертификат олган сана:
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="account-info-text">
                                                    {{\Carbon\Carbon::parse($student->certificate_date)->format('d-m-Y')}}
                                                </p>
                                            </div>
                                        </li>
                                        <li class="d-flex align-items-center justify-content-between">
                                            <div class="col-md-6">
                                                <p class="account-info-title">
                                                    Таълим муассаси номи:
                                                </p>
                                            </div>
                                            <div class="col-md-6">
                                                <p class="account-info-text">
                                                    {{$student->college->name}}
                                                </p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="qr-code-box d-flex align-items-center justify-content-center">
                                    <img src="{{$qrCode}}" alt="QR Code" />
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

@endsection