<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class NotificationController extends Controller
{
    public function sendEmails(){
        Artisan::call('emails:notify');
        return back()->with('status','Emel Berjaya di hantar!');
    }
}
