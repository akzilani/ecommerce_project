<?php

namespace App\Http\Controllers;

use App\Mail\GenerationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(Request $request){
        if($request->has('email')){
            $email= $request->get('email');
            $pass = Rand(100001,999999);

            $details= [
                'title'=>'Send User Password',
                'body'=> 'Your password is '. $pass ,
            ];

            Mail::to($email)->send(new GenerationMail($details));
            return json_encode(['success'=>true, 'response_code'=>200]);
        } else{
            return json_encode(['success'=>false, 'response_code'=>404]);
        }


    }
}
