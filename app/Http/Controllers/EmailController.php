<?php

namespace App\Http\Controllers;

use App\Mail\TestEmail;
use Illuminate\Http\Request;
use Mail;

class EmailController extends Controller
{
    public function sendEmail()
    {
        $toEmail="aankitbelal@gmail.com";
        $mailMessage="this is a test email";
        $subject="Test Email";  

        Mail::to($toEmail)->send(new TestEmail($mailMessage,$subject));
        dd("Email is Sent.");

    }
}
