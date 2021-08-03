<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\client\BaseControllerForClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends BaseControllerForClient
{
    public function index(){
        /*$url = $request->url();
        $replace = str_replace($url,'http://certificate.loc',$url);*/
        $tickets = $this->get('http://support.loc/api/ticketAll');
        return view('tickets.index',[
            'tickets' => $tickets->data,
        ]);
    }

    public function create(){
        $user = Auth::user();
        $categories = $this->get('http://support.mc.uz/api/categoryAll');
        return view('tickets.create',[
            'user' => $user,
           'categories' => $categories->data
        ]);
    }

    public function store(Request $request){
        $request = $request->except('_token');
        $ticket = $this->put('http://support.mc.uz/api/ticks1',$request,true,'screenshot');
        if($ticket == true)
        {
            return redirect()->route('ticket.index');
        }
    }

    public function show($id){
        $ticket = $this->get('http://support.loc/api/ticks1/'.$id);
        return $ticket;
    }
}
