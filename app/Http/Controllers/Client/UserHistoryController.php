<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserHistoryController extends Controller
{
    public function index()
    {
        return view('client.user-history.index');
    }
}
