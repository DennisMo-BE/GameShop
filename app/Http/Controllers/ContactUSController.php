<?php

namespace App\Http\Controllers;

use App\ContactUS;
use Illuminate\Http\Request;
use Mail;

use App\Http\Requests;

class ContactUSController extends Controller
{
    //pagina tonen
    public function contactUS(){
        return view('contactUS');
    }

    //required fields voor contact form
    public function contactUSPost(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required',
            'g-recaptcha-response'=>'required'
        ]);
        ContactUS::create($request->all());

        //mail zenden naar mijn gmail -> mail smtp defined via env.
        Mail::send('email',array(
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'user_message' => $request->get('message'),

        ),function($message){
            $message->from('d@test.be');
            $message->to('dennis.mohammad2@gmail.com', 'Admin')->subject('GameShop Feedback');
        });
        return back()->with('success', 'Message sended!');
    }
}



















