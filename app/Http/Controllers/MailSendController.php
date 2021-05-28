<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MailingList;
use Illuminate\Support\Facades\Mail;
use App\Mail\Mailing;

class MailSendController extends Controller
{
    public function send(){
        $list = MailingList::where('subscribe',1)->get();
        foreach ($list as $mail){
            Mail::to($mail->email)->send(new Mailing());
        }
        return response(json_encode(['request'=>'send completed']),200);
    }
}
