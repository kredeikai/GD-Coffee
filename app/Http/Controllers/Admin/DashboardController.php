<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $totalMenus   = Menu::count();
        $totalOrders  = Order::count();
        $pendingOrder = Order::where('status', 'pending')->count();
        $totalContact = Contact::count();

        return view('admin.dashboard', compact(
            'totalMenus',
            'totalOrders',
            'pendingOrder',
            'totalContact'
        ));
    }
}
