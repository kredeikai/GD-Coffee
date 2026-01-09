<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_active', 1)
            ->orderBy('name')
            ->get();

        return view('customer.menu', compact('menus'));
    }
}
