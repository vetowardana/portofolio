<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Artikel;

class FrontController extends Controller
{
    public function index() {
    	$artikel = Artikel::paginate(6);

    	return view('layouts.front.depan', compact('artikel'));
    }

    public function show($id) {
    	$artikel = Artikel::find($id);

    	return view('layouts.front.detail', compact('artikel'));
    }
}
