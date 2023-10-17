<?php

namespace App\Http\Controllers;
use App\Models\DashboardProduct;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dashboard_productos = DashboardProduct::all();
        return view('home', compact('dashboard_productos'));
    }
}
