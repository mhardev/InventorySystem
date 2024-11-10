<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemProductController extends Controller
{
    public function index()
    {
        return view('client.item-products.index');
    }
}
