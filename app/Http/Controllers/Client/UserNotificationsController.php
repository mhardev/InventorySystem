<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserNotificationsController extends Controller
{
    public function index()
    {
        return view('client.user-notifications.index');
    }
}
