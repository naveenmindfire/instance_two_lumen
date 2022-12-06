<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;

class EmailController extends Controller
{

     //send email
     public function send(Request $request) {
        
        //return response()->json(['success' => 'mail sent']);
        $postedData = ['name'=>$request->name,'email'=>$request->email,'message'=>$request->message];
        
        $data = array('name'=>$postedData['name'],'mailBody'=>$postedData['message']);
        $message = $postedData['message'];
        Mail::send('mail', $data, function($message) use($postedData) {
        $message->to($postedData['email'], $postedData['name'])->subject('Test Mail');
        $message->from('mfsi.naveenb@gmail.com','Test');
        });
        
        return response()->json(['success' => $postedData['message']]);
        //echo "Email Sent. Check your inbox.";
    }
}
