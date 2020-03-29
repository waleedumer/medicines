<?php

namespace App\Http\Controllers;

use App\Models\UserAccess;
use Illuminate\Http\Request;

class UserAccessController extends Controller
{
    
    public function index()
    {
        $access = UserAccess::with(['user', 'category'])->get();
        
    }

    
    public function create()
    {
    
    }

    
    public function store(Request $request)
    {
        //
    }

   
    public function show(UserAccess $userAccess)
    {
        //
    }

    
    public function edit(UserAccess $userAccess)
    {
        //
    }

   
    public function update(Request $request, UserAccess $userAccess)
    {
        //
    }

   
    public function destroy(UserAccess $userAccess)
    {
        //
    }
}
