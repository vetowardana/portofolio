<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Artikel;

class DashboardController extends Controller
{
    public function index() {
    	$user = User::count();
    	$artikel = Artikel::count();

    	return view('layouts.user.dashboard', compact('user','artikel'));
    }
}
