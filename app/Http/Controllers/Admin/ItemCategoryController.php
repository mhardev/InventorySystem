<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{
    public function index()
    {
        return view('admin.item-categories.index');
    }
}
