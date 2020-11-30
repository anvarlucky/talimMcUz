@extends('layouts.mainDiyorAdmin')
@section('content')
    <div class="container-fluid p-5">
        <div class="col-12 px-0 table-box">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th colspan="2" class="darkblue-color">Вилоят туманлари</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($districts as $key => $district)
                        <tr>
                            <th class="lightblue-color w-2" scope="row">{{++$key}}</th>
                            <td class="darkblue-color">{{$district->name}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection