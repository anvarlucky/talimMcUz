@extends('layouts.mainDiyorAdmin')
@section('content')
            <div class="container-fluid p-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="statistic-info-box all-info-box p-md-5">

                            <img src="{{asset('/assets/diyor/images/group-person-2.svg')}}" class="mb-3" alt="svg">

                            <p class="statistic-info-box-text">Ҳаммаси:</p>

                            <p class="statistic-info-box-num-text">{{$all}}</p>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="statistic-info-box readers-info-box p-md-5">
                            <img src="{{asset('/assets/diyor/images/homework.svg')}}" class="mb-3" alt="svg">
                            <p class="statistic-info-box-text">Ўқиётганлар:</p>
                            <p class="statistic-info-box-num-text">{{$allStudy}}</p>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="statistic-info-box graduates-info-box p-md-5">
                            <img src="{{asset('/assets/diyor/images/medal.svg')}}" class="mb-3" alt="svg">
                            <p class="statistic-info-box-text">Тугатганлар:</p>
                            <p class="statistic-info-box-num-text">{{$allFinish}}</p>

                        </div>
                    </div>
                </div>
            </div>

            <div class="container-fluid p-5">
                <div class="col-12 px-0">
                    <div class="statistic-container-info p-md-5">
                        <img src="{{asset('/assets/diyor/images/big-image.svg')}}" class="w-100 h-100" alt="svg">
                    </div>
                </div>
            </div>
@endsection