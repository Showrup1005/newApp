<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail()
    {
        $to = "showrupd@gmail.com";
        $sub = "Test E-mail";
        $msg = "This is a test email from controller";
        Mail::to($to)->send(new WelcomeEmail($sub, $msg));
        return "Email sent successfully";
    }
}
