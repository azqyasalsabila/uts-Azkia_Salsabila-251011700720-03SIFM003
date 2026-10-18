<?php

namespace App\Http\Controllers;

use App\Models\Craft;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminCraftController extends Controller
{
    public function index()
    {
        $crafts = Craft::latest()->get();

        return view('admin.crafts.index', compact('crafts'));
    }

    public function create()
    {
        return view('admin.crafts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'artisan' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'material' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $image = $request->file('image');
        $directory = public_path('assets/images');

        if (!is_dir($directory)) {
            mkdir($directory, 0755, true);
        }

        $imageName = Str::uuid() . '.' . $image->extension();
        $image->move($directory, $imageName);

        $validated['image'] = $imageName;

        Craft::create($validated);

        return redirect()
            ->route('admin.crafts.index')
            ->with('success', 'Produk berhasil ditambahkan!');
    }

    public function edit(Craft $craft)
    {
        return view('admin.crafts.edit', compact('craft'));
    }

    public function update(Request $request, Craft $craft)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'artisan' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'material' => 'required|string|max:100',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        unset($validated['image']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $directory = public_path('assets/images');

            if (!is_dir($directory)) {
                mkdir($directory, 0755, true);
            }

            $imageName = Str::uuid() . '.' . $image->extension();
            $image->move($directory, $imageName);

            $validated['image'] = $imageName;
        }

        $craft->update($validated);

        return redirect()
            ->route('admin.crafts.index')
            ->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Craft $craft)
    {
        // Hapus data produk tanpa menghapus file foto.
        $craft->delete();

        return redirect()
            ->route('admin.crafts.index')
            ->with('success', 'Produk berhasil dihapus!');
    }
}
