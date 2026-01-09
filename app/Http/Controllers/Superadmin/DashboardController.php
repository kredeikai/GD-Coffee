<?php

namespace App\Http\Controllers\Superadmin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $year = $request->get('year', now()->year);

        // ======================
        // KPI
        // ======================
        $totalRevenue = Order::where('status', 'ready')->sum('total_price');

        $monthlyRevenue = Order::whereYear('created_at', $year)
            ->where('status', 'ready')
            ->sum('total_price');

        $totalOrders = Order::whereYear('created_at', $year)->count();

        $activeCustomers = User::where('role', 'customer')
            ->whereHas('orders', function ($q) use ($year) {
                $q->whereYear('created_at', $year);
            })->count();

        $avgOrderValue = Order::whereYear('created_at', $year)
            ->where('status', 'ready')
            ->avg('total_price');

        // ======================
        // CHART DATA
        // ======================
        $revenuePerMonth = Order::selectRaw('MONTH(created_at) as month, SUM(total_price) as total')
            ->whereYear('created_at', $year)
            ->where('status', 'ready')
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $orderPerMonth = Order::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
            ->whereYear('created_at', $year)
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        // ======================
        // TOP MENU
        // ======================
        $topMenus = OrderItem::select(
                'menu_id',
                DB::raw('SUM(qty) as total_sold')
            )
            ->whereHas('order', function ($q) use ($year) {
                $q->whereYear('created_at', $year)
                  ->where('status', 'ready');
            })
            ->groupBy('menu_id')
            ->orderByDesc('total_sold')
            ->with('menu')
            ->limit(5)
            ->get();

        return view('superadmin.dashboard', compact(
            'year',
            'totalRevenue',
            'monthlyRevenue',
            'totalOrders',
            'activeCustomers',
            'avgOrderValue',
            'revenuePerMonth',
            'orderPerMonth',
            'topMenus'
        ));
    }
}
