<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $orders = auth()->user()->orders()->latest()->take(5)->get();
        return view('dashboard', compact('orders'));
    }
}
