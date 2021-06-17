<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Artikel;
Use \Carbon\Carbon;
use Auth;
use File;

class ArtikelController extends Controller
{
    public function index() {
    	$user_id = auth()->user()->id;
        $artikel = Artikel::get()->all();
        $id = Artikel::where('user_id', $user_id)->first();

    	return view('layouts.artikel.index',compact('artikel','id'));
    }

    public function store(Request $request) {
        $user_id = auth()->user()->id;
        $user = auth()->user();

        $this->validate($request, [
            'judul' => 'required|unique:artikels|string|max:100',
            'uraian' => 'required',
            'image' => 'required|image|mimes:png,jpeg,jpg',
        ]);

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        //jika ada file
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/artikel', $filename);
            $artikel = Artikel::create([
                'user_id' => $user_id,
                'judul' => $request->judul,
                'uraian' => $request->uraian,
                'image' => $filename,
                'slug' => $request->judul,
                'tanggal_posting' => $tanggal->format('Y-m-d'),
                'name' => $user->name,
            ]);
            return redirect(route('artikel.index'))->with(['success' => 'Artikel berhasil ditambahkan']);
        }
        return redirect(route('artikel.index'))->with(['error' => 'Artikel gagal ditambahkan']);
    }

    public function edit($id) {
        $artikel = Artikel::find($id);

        return view('layouts.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id) {
        $user_id = auth()->user()->id;
        $this->validate($request, [
            'judul' => 'required|string|max:100',
            'uraian' => 'required',
            'image' => 'image|mimes:png,jpeg,jpg',
        ]);

        $timezone ='Asia/Jakarta';
        $tanggal = Carbon::now($timezone);

        $artikel = Artikel::find($id);
        $filename = $artikel->image;

        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('public/artikel', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/artikel/' . $artikel->image));
        }

        $artikel->update([
            'user_id' => $user_id,
            'judul' => $request->judul,
            'uraian' => $request->uraian,
            'image' => $filename,
            'slug' => $request->judul,
            'tanggal_posting' => $tanggal->format('Y-m-d'),
        ]);
        return redirect(route('artikel.index'))->with(['success' => 'Artikel berhasil diperbaharui']);
    }

    public function destroy($id) {
        $artikel = Artikel::find($id);
        File::delete(storage_path('app/public/artikel/' . $artikel->image));
        $artikel->delete();
        return redirect(route('artikel.index'))->with(['success' => 'Artikel berhasil Dihapus']);
    }
}
