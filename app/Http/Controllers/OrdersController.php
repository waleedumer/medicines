<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Models\Products;
use Illuminate\Http\Request;


class OrdersController extends Controller
{
    
    public function index()
    {
        $products = Products::get();
        return view('orders.index', ['products' => $products]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Orders $orders)
    {
        //
    }

    
    public function edit(Orders $orders)
    {
        //
    }

    
    public function update(Request $request, Orders $orders)
    {
        //
    }

    
    public function destroy(Orders $orders)
    {
        //
    }
}
