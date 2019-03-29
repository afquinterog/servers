<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NewContactSent;
use App\User;
use Log;

class ContactController extends Controller
{
    /**
     * Send a new contact message from the marketing application
     */
    public function send(Request $request){
        $data = $request->only('name', 'email', 'company');
        //Log::info('data =' . $data );
        //print_r($data);
        //exit;

        $user = User::find(1);
        $user->notify(new NewContactSent($data));

        return back()->withInput()->with('status', 'Profile updated!');;
    }
}
