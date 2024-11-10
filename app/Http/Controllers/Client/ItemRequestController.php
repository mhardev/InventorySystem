<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemRequestController extends Controller
{
    public function index()
    {
        return view('client.item-requests.index');
    }
}
