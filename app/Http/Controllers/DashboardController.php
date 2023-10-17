<?php

namespace App\Http\Controllers;
use App\Models\DashboardProduct;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index (){
        $dashboard_productos = DashboardProduct::all();
        return view('home', compact('dashboard_productos'));
    }

    public function save_producto(){
        return view('form_save_producto');
    }


    public function guardar_producto(request $request){
        $user = new DashboardProduct();
        $user-> producto = $request -> input('producto');
        $user-> cantidad = $request -> input('cantidad');
        $user-> precio = $request -> input('precio');
        $user-> save();

        return redirect()-> route('home');
    }

    public function delete_producto($id){
        $user = DashboardProduct::findOrfail($id);
        $user->delete();

        return redirect()->route('home');
    }

    public function edit_producto($id){
        $user = DashboardProduct::findOrfail($id);

        return view('form_editar',compact('user'));
    }

    public function update_producto(Request $request, $id){
        $user = DashboardProduct::findOrfail($id);
        $user->producto = $request->input('producto');
        $user->cantidad = $request->input('cantidad');
        $user->precio = $request->input('precio');
        $user->save();

        return redirect()->route('home');
    }

    public function aboutme (){
        return view('aboutme');
    }






}
