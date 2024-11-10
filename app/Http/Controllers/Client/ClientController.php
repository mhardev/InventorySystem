<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Usernotif;
use App\Models\Itemrequest; // Add this line
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $userId = auth()->user()->id;
        $usernotifications = Usernotif::where('user_id', $userId)->orderByDesc('created_at')->get();

        // Fetch item requests related to notifications
        $itemRequestIds = $usernotifications->pluck('request_id');
        $itemRequests = Itemrequest::whereIn('id', $itemRequestIds)->get();

        return view('client.homepage', compact('usernotifications', 'itemRequests'));
    }
}
