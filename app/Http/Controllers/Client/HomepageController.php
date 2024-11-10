<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Itemrequest;
use Illuminate\Http\Request;

class HomepageController extends Controller
{

    public function barChart()
    {
        $pendingCount = Itemrequest::where('status', 0)->count();
        $approvedCount = Itemrequest::where('status', 1)->count();
        $cancelledCount = Itemrequest::where('status', 2)->count();

        return response()->json([
            'pendingCount' => $pendingCount,
            'approvedCount' => $approvedCount,
            'cancelledCount' => $cancelledCount,
        ]);
    }

    public function index()
    {
        return view('client.homepage');
    }
}
