<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Events\ChatEvent;

class ChatController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

    public function chat()
    {
    	return view('chat');
    }

    public function send()
    {
    	$message = request('message');
    	$user = auth()->user();

    	event(new ChatEvent($message, $user));
    }
}
