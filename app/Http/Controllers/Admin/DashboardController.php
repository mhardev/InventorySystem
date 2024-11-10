<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Itemuser;
use App\Models\Itemrequest;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function barChart()
    {
        $pendingCount = Itemrequest::where('status', 0)->count();
        $approvedCount = Itemrequest::where('status', 1)->count();
        $cancelledCount = Itemrequest::where('status', 2)->count();

        return response()->json([
            'pending' => $pendingCount,
            'approved' => $approvedCount,
            'cancelled' => $cancelledCount,
        ]);
    }

    public function index()
    {
        $totalAllUsers = User::count();
        $totalUsers = User::where('role_as', '0')->count();
        $totalSubCategories = Subcategory::count();
        $totalBrands = Brand::count();
        $totalItems = Product::count();

        $lowestProducts = Product::orderBy('item_stock', 'ASC')->take(5)->get();


        $mostUnitRequests = Itemrequest::select(
            'users.department',
            DB::raw('COUNT(DISTINCT itemrequest.user_id, itemrequest.id) as total_requests')
        )
        ->join('users', 'itemrequest.user_id', '=', 'users.id')
        ->groupBy('users.department')
        ->orderByDesc('total_requests')
        ->get();

        $mostUsedItems = Itemuser::withMostUsedItems()->where('itemusers.status', 1)->orderByDesc('total_item_stock')->take(10)->get();

        return view('admin.dashboard', compact('totalAllUsers', 'totalUsers', 'totalSubCategories', 'totalBrands', 'totalItems', 'lowestProducts', 'mostUsedItems', 'mostUnitRequests'));
    }
}
