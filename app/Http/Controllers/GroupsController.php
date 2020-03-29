<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    
    public function index()
    {
        $groups = Groups::paginate(15);
        return view('groups.index', ['groups' => $groups]);
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'discount_rate' => $request->discount
        ];
        Groups::create($data);
        return redirect()->route('groups.index')->withStatus(__('New Group added successfuly'));
    }

   
    public function show(Groups $groups)
    {
        //
    }

    
    public function edit(Groups $groups)
    {
        //
    }

   
    public function update(Request $request, Groups $groups)
    {
        //
    }

    
    public function destroy(Groups $groups)
    {
        //
    }
}
