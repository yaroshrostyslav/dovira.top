<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class ContactsController extends Controller
{
    public function send(Request $request){

        $data = ['name' => $request->name, 'email' => $request->email, 'messages' => $request->message];

        Mail::send(['html' => 'mail'], $data, function ($message) {
            $message->to('info@dovira.top', 'Admin')->subject("Форма зворотнього зв'язку");
            $message->from('info@dovira.top', 'Dovira.top');
        });

        //print_r($request->all());
        return redirect('/contacts')->with('status', 'Повідомлення успішно відправлено!');;
    }
}
