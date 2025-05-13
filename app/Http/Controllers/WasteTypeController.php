<?php

namespace App\Http\Controllers;

use App\Models\WasteType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WasteTypeController extends Controller
{
    public function index()
    {
        $wasteTypes = WasteType::orderBy('created_at', 'desc')->paginate(6);

        return view('pages.admin.data-sampah', compact('wasteTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
        ]);

        $data = [
            'name' => $request->name,
            'price_per_kg' => $request->price_per_kg,
            'description' => $request->description,
            'status' => 'active',
        ];

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('waste-types', 'public');
            $data['image_path'] = $path;
        }

        WasteType::create($data);

        return redirect()->back()->with('success', 'Data sampah berhasil ditambahkan');
    }

    public function update(Request $request, string $id)
    {
        $wasteType = WasteType::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'price_per_kg' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ]);

        $data = [
            'name' => $request->name,
            'price_per_kg' => $request->price_per_kg,
            'description' => $request->description,
            'status' => $request->status,
        ];

        if ($request->hasFile('image')) {
            if ($wasteType->image_path && Storage::disk('public')->exists($wasteType->image_path)) {
                Storage::disk('public')->delete($wasteType->image_path);
            }

            $path = $request->file('image')->store('waste-types', 'public');
            $data['image_path'] = $path;
        }

        $wasteType->update($data);

        return redirect()->back()->with('success', 'Data sampah berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $wasteType = WasteType::findOrFail($id);
        $name = $wasteType->name;

        if ($wasteType->image_path && Storage::disk('public')->exists($wasteType->image_path)) {
            Storage::disk('public')->delete($wasteType->image_path);
        }

        $wasteType->delete();

        return redirect()->back()->with('success', "Data sampah $name berhasil dihapus");
    }
}
