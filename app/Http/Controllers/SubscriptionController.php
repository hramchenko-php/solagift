<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Models\MailingList;
use Illuminate\Support\Facades\Crypt;

class SubscriptionController extends Controller
{
    public function store(EmailRequest $request){
        $data = MailingList::create($request->validated());
        return response($data,201);
    }

    public function unsubscribe($mail){
        $mail = Crypt::decrypt($mail);
        $list = MailingList::where('email',$mail)->first();
        $list->subscribe = 0;
        $list->save();
        return response($list,200);
    }
}
