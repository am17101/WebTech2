<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
Use Gate;
class MessagesController extends Controller
{
    public function submit(Request $request){
    	$this->validate($request, [
    		'name'=>'required',
    		'email'=>'required'
    	]);
    	// Create a new message
    	$message = new Message;
    	$message->name = $request->input('name');
    	$message->email = $request->input('email');
    	$message->messages = $request->input('message');
    	//save message
    	$message->save();

    	//redirect
    	return redirect('contact')->with('success', 'Message Sent');
    }


    public function getMessages(){
        if(!Gate::allows('isAdmin')){
            abort(404,"Sorry, you can not access this");
            }
    	$messages = Message::all();

    	return view('messages')->with('messages', $messages);
    }
}
