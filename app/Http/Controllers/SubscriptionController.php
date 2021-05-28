<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\EmailRequest;
use App\Models\MailingList;

class SubscriptionController extends Controller
{
    public function store(EmailRequest $request){
        $data = MailingList::create($request->validated());
        return response($data,201);
    }
}
