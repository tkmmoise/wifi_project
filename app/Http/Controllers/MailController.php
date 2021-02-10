<?php

namespace App\Http\Controllers;

use App\Mail\MailAlertTickets;
use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $details = [
            'title' => 'Mail from Wifi App',
            'body' => 'Alert le nombre de tickets est inferieur a 50'
        ];
       
        Mail::to('moiset.2580@gmail.com')->send(new MailAlertTickets($details));
       
        return ("Email is Sent.");
    }
}
