<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class NasabahController extends Controller
{
    public function index()
    {
        $nasabah = User::where('role', 'nasabah')->with('balance')->orderBy('created_at', 'desc')->paginate(6);

        foreach ($nasabah as $user) {
            $user->saldo = $user->balance ? $user->balance->amount : 0;
        }

        return view('pages.admin.data-nasabah', compact('nasabah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6',
            'alamat' => 'nullable|string',
        ]);

        User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'role' => 'nasabah',
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Data nasabah berhasil ditambahkan');
    }

    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);

        $rules = [
            'name' => 'required|string|max:255',
            'username' => ['required', 'string', 'max:255', Rule::unique('users')->ignore($user->id)],
            'no_hp' => 'nullable|string|max:15',
            'alamat' => 'nullable|string',
            'status' => 'required|in:active,inactive',
        ];

        if ($request->filled('password')) {
            $rules['password'] = 'string|min:6';
        }

        $validated = $request->validate($rules);

        $user->name = $validated['name'];
        $user->username = $validated['username'];
        $user->no_hp = $validated['no_hp'] ?? $user->no_hp;
        $user->alamat = $validated['alamat'] ?? $user->alamat;
        $user->status = $validated['status'];

        if ($request->filled('password')) {
            $user->password = Hash::make($validated['password']);
        }

        $user->save();

        return redirect()->back()->with('success', 'Data nasabah berhasil diperbarui');
    }

    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $name = $user->name;

        $user->delete();

        return redirect()
            ->back()
            ->with('success', "Data nasabah $name berhasil dihapus");
    }

    public function iuran()
    {
        return view('pages.nasabah.iuran');
    }

    public function riwayat()
    {
        return view('pages.nasabah.riwayat');
    }
}
