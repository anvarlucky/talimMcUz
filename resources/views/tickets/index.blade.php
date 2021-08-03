@extends('layouts.mainDiyor')
@section('content')
    <div class="container-fluid p-5">
        <div class="d-flex justify-content-between align-items-center">
            {{--<p class="title-list">Қисқа муддатли ўқув курсларида иштирок этаётган тингловчилар рўйхати</p>--}}
            {{--<form action="{{route('students.search')}}" method="post" class="input-group  search-input col-4 mb-3">
                @csrf
                <input type="text" name="search" class="form-control focus-none border-right-0" placeholder="Қидирув"
                       aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="input-group-text"><i class="fa fa-search" type="button"></i></button>
                </div>
            </form>--}}
        </div>

        <div class="col-12 px-0 table-box">
            <div class="table-top-panel d-flex align-items-center justify-content-between px-2 py-3">
                <ul class="d-flex">
                    <li class="col px-0 mx-3 table-top-panel-items {{--active--}} {{route('ticket.index') ? 'active' : ''}}">
                        <a href="{{route('ticket.index')}}" class="text-decoration-none table-top-panel-items-link">Ticketlar</a>
                    </li>
{{--                    <li class="col px-0 mx-3 table-top-panel-items">
                        <a href="{{route('certified')}}" class="text-decoration-none table-top-panel-items-link">Тамомлаганлар</a>
                    </li>--}}
                </ul>


                <a href="{{route('ticket.create')}}" class="btn adding-button">
                    Yangi qo`shish <i class="fa fa-plus ml-2 mt-1"></i>
                </a>
            </div>


            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th class="lightblue-color w-2" scope="col">#</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Ticket id</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Sarlavha</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Dastur</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Prioritet</th>
                        <th class="darkblue-color text-center align-top">Kategoriya</th>
                        <th class="darkblue-color text-center text-nowrap align-top">Holat</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($tickets as $key => $ticket)
                        <tr>
                            <th class="lightblue-color w-2 align-middle" scope="row">{{++$key}}</th>
                            <td class="darkblue-color text-center text-nowrap align-middle">{{$ticket->id}}</td>
                            <td class="darkblue-color text-center text-nowrap align-middle"><a href="{{route('ticket.show',$ticket->id)}}">{{$ticket->title}}</a></td>
                            <td class="darkblue-color text-center text-nowrap align-middle">{{$ticket->project_name}}</td>
                            @if($ticket->priority==1)
                                <td class="alert-primary"></td>
                            @elseif($ticket->priority==2)
                                <td class="alert-warning"></td>
                            @elseif($ticket->priority==3)
                                <td class="alert-danger"></td>
                            @else
                                <td></td>
                                @endif
                            <td class="darkblue-color text-center text-nowrap align-middle">{{$ticket->category_name}}
                            </td>
                            @if($ticket->status==1)
                                <td><span class="btn btn-danger">Ochiq</span></td>
                            @elseif($ticket->status==2)
                                <td><span class="btn btn-primary">Ish jarayonida</span></td>
                            @else
                                <td><span class="btn btn-success">Yopiq</span></td>
                            @endif
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