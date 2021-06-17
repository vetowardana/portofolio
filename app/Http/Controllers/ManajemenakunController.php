<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Str;

use App\User;

class ManajemenakunController extends Controller
{
    public function index() {
    	$Level = auth()->user()->level;
    	$akun = User::get()->all();

    	return view('layouts.manajemen_akun.tambah', compact('akun'));
    }

    public function store(Request $request) {
    	$this->validate($request, [
            'name' => 'required|string|min:1|max:100',
            'username' => 'required|unique:users|string|max:100',
            'password' => 'required_with:konfirmPass|same:konfirmPass|min:8|max:24',
            'konfirmPass' => 'min:8',
            'image' => 'required|image|mimes:png,jpeg,jpg'
        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/user', $filename);
            $user = User::create([
                'name' => $request->name,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'image' => $filename,
                'slug' => $request->name,
                'remember_token' => Str::random(60),
            ]);
            return redirect(route('manajemenakun.index'))->with(['success' => 'Berhasil Ditambahkan !']);
        }
    }
}
