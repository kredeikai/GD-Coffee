<?php
// A
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\Storage;
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
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'boolean',
        ]);

        // UPLOAD IMAGE
        if ($request->hasFile('image')) {
            $validated['image_path'] = $request->file('image')
                ->store('menus', 'public'); // ⬅️ PENTING
        }

        Menu::create($validated);

        return redirect()->route('menus.index')->with('success', 'Menu berhasil ditambahkan');
    }


    public function edit(Menu $menu)
    {
        return view('admin.menus.edit', compact('menu'));
    }

    public function update(Request $request, Menu $menu)
    {
        $validated = $request->validate([
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
            'price'       => 'required|numeric|min:0',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_active'   => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            // hapus lama
            if ($menu->image_path) {
                Storage::disk('public')->delete($menu->image_path);
            }

            $validated['image_path'] = $request->file('image')
                ->store('menus', 'public');
        }

        $menu->update($validated);

        return redirect()->route('menus.index')->with('success', 'Menu diperbarui');
    }

    public function destroy(Menu $menu)
    {
        // hapus gambar dari storage
        if ($menu->image_path) {
            Storage::disk('public')->delete($menu->image_path);
        }

        $menu->delete();

        return redirect()
            ->route('menus.index')
            ->with('success', 'Menu berhasil dihapus');
    }
}
