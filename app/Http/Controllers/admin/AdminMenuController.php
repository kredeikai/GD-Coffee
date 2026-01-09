<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class AdminMenuController extends Controller
{
    public function index()
    {
        $menus = Menu::orderBy('name')->paginate(6);
        return view('admin.menus.index', compact('menus'));
    }

    public function create()
    {
        return view('admin.menus.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|integer|min:0',
            'image'       => 'nullable|image|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/menus'), $filename);

            $data['image_path'] = 'menus/' . $filename;
        }

        $data['is_active'] = $request->boolean('is_active', false);

        Menu::create($data);

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu berhasil ditambahkan.');
    }

    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric',
            'image'       => 'nullable|image|max:2048',
            'is_active'   => 'nullable|boolean',
        ]);

        $imagePath = $menu->image_path;

        if ($request->hasFile('image')) {

            if ($menu->image_path) {
                $oldFile = public_path('images/' . $menu->image_path);
                if (file_exists($oldFile)) {
                    unlink($oldFile);
                }
            }

            // Upload baru
            $filename = time() . '_' . $request->file('image')->getClientOriginalName();
            $request->file('image')->move(public_path('images/menus'), $filename);

            $imagePath = 'menus/' . $filename;
        }

        // Update data menu
        $menu->update([
            'name'        => $request->name,
            'description' => $request->description,
            'price'       => $request->price,
            'image_path'  => $imagePath,
            'is_active'   => $request->boolean('is_active', false),
        ]);

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu berhasil diperbarui.');
    }

    public function destroy(Menu $menu)
    {
        if ($menu->image_path) {
            $file = public_path('images/' . $menu->image_path);
            if (file_exists($file)) {
                unlink($file);
            }
        }

        $menu->delete();

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu berhasil dihapus.');
    }
}
