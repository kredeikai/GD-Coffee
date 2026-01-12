<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Tampilkan daftar pesanan customer (My Orders)
     */
    public function index()
    {
        $orders = Order::with(['items.menu'])
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('customer.orders.index', compact('orders'));
    }

    /**
     * Simpan pesanan baru (order dari menu detail)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id' => ['required', 'exists:menus,id'],
            'qty'     => ['required', 'integer', 'min:1'],
            'type'    => ['required', 'in:pickup,delivery'],
        ]);

        $menu = Menu::findOrFail($data['menu_id']);

        // Buat order
        $order = Order::create([
            'user_id'     => Auth::id(),
            'type'        => $data['type'],
            'status'      => 'pending',
            'total_price' => $menu->price * $data['qty'],
        ]);

        // Simpan item order
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id'  => $menu->id,
            'qty'      => $data['qty'],
            'price'    => $menu->price,
        ]);

        return redirect()
            ->route('customer.order')
            ->with('success', 'Pesanan berhasil dibuat');
    }

    /**
     * Simpan pesanan baru (order dari menu detail)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'menu_id' => ['required', 'exists:menus,id'],
            'qty'     => ['required', 'integer', 'min:1'],
            'type'    => ['required', 'in:pickup,delivery'],
        ]);

        $menu = Menu::findOrFail($data['menu_id']);

        // Buat order
        $order = Order::create([
            'user_id'     => Auth::id(),
            'type'        => $data['type'],
            'status'      => 'pending',
            'total_price' => $menu->price * $data['qty'],
        ]);

        // Simpan item order
        OrderItem::create([
            'order_id' => $order->id,
            'menu_id'  => $menu->id,
            'qty'      => $data['qty'],
            'price'    => $menu->price,
        ]);

        return redirect()
            ->route('customer.order')
            ->with('success', 'Pesanan berhasil dibuat');
    }
}