<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;
use App\Models\Menu;

class PublicMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::where('is_active', 1)
            ->orderBy('name')
            ->get();

        return view('coffeeshop.menu', compact('menus'));
    }
}
