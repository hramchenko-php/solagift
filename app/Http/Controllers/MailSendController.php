<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailingList;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailing;

class MailSendController extends Controller
{
    public function send(){
        //TODO дописать получение через select
        $list = MailingList::select('email')->where('subscribe',1)->get();
        foreach ($list as $mail){
            $unsubscribeLink = route('unsubscribe',['mail'=>Crypt::encrypt($mail->email)]);
            Mail::to($mail->email)->send(new Mailing($unsubscribeLink));
        }
        return response(json_encode(['request'=>'send completed']),200);
    }
}
