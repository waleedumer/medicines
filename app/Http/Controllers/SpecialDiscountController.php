<?php

namespace App\Http\Controllers;

use App\Models\SpecialDiscount;
use App\Models\Products;
use App\User;
use Illuminate\Http\Request;
use Yajra\Datatables\DataTables;

class SpecialDiscountController extends Controller
{
    
    public function index()
    {
        $discounts = SpecialDiscount::with(['user', 'product'])->get();
        return view('discounts.list', ['discounts' => $discounts]);
    }

    public function anyData()
    {
        return DataTables::of(Products::query())->make(true);
    }

    
    public function create()
    {
        $users = User::get();
        $products = Products::paginate(20);
        return view('discounts.create', ['users' => $users, 'products' => $products]);
    }

    
    public function store(Request $request)
    {
        
        foreach ($request->tableData as $row) {
            $data = [
                'user_id' => $row['user_id'],
                'product_id' => $row['product_id'],
                'amount' => $row['amount']
            ];
            SpecialDiscount::create($data);
        }
        return response()->json(['success'=>'Data is successfully added']);
    }

  
    public function show(SpecialDiscount $specialDiscount)
    {
        //
    }

    
    public function edit(SpecialDiscount $specialDiscount)
    {
        //
    }

  
    public function update(Request $request, SpecialDiscount $specialDiscount)
    {
        //
    }

   
    public function destroy(SpecialDiscount $specialDiscount)
    {
        //
    }
}
