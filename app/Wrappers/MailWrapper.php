<?php

namespace App\Wrappers;



use App\Mail\Notifications;
use Illuminate\Support\Facades\Mail;

class MailWrapper
{


    public static function emailNotify($emailAddress, $data)
    {
        $mailData = [
            'title' => $data['title'],
            'message' => $data['message'],
        ];

        Mail::to($emailAddress)->send(new Notifications($mailData));

        return response('', 200);
    }

    public static function transactionSuccess($emailAddress, $data)
    {
        $mailData = [
            'title'=>'Transaction Success',
            'message' => 'Hi'.$data['name'].' your transaction of $'.$data['amount'].' paid using credit card ending with '.$data['number'].' was successful',

        ];

        Mail::to($emailAddress)->send(new Notifications($mailData));

        return response('', 200);
    }
}
