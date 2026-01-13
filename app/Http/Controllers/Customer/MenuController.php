<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Tampilkan semua menu (customer)
     */
    public function index()
    {
        $menus = Menu::where('is_active', true)
            ->orderBy('name')
            ->get();

        return view('customer.menu.index', compact('menus'));
    }

    /**
     * Detail menu
     */
    public function show(Menu $menu)
    {
        abort_if(!$menu->is_active, 404);

        return view('customer.menu.show', compact('menu'));
    }
}