<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\UserRequest;
use App\Models\Groups;
use App\Models\Products;
use App\Models\UserAccess;
use App\Models\SpecialDiscount;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    
    public function index(User $model)
    {
        $groups = Groups::get();
        return view('users.index', ['users' => $model->paginate(15), 'groups' => $groups]);
    }

    
    public function create()
    {
        $groups = Groups::get();
        $categories = ProductCategories::get();
        $products = Products::get();
        return view('users.create', ['groups' => $groups, 'categories' => $categories, 'products' => $products]);
    }

    
    public function store(UserRequest $request, User $model)
    {
        $categories = ProductCategories::get();
        $user = $model->create($request->merge(['password' => Hash::make($request->get('password')),
                                        'group_id' => $request->group,
                                        'business_name' => $request->businessName,
                                        'post_code' => $request->postCode,
                                        'address' => $request->address,
                                        'phone' => $request->phone,
                                        'lat' => $request->lat,
                                        'lng' => $request->long,
                                        'mobile' => $request->mobile])->all());
        foreach($categories as $category){
            if($request->has('cat-'.$category->id)){
                $data = [
                    'user_id' => $user->id,
                    'category_id' => $category->id
                ];
                UserAccess::create($data);
            }
        }
        return redirect()->route('user.index')->withStatus(__('User successfully created.'));
    }

    
    public function edit(User $user)
    {
        $groups = Groups::get();
        $categories = ProductCategories::get();
        // $user = User::with('group')->get();
        $userAccess = UserAccess::where('user_id', $user->id);
        $discounts = SpecialDiscount::with('product')->where('user_id', $user->id)->get();
        // print_r($discounts);
        // echo $user->id;
        // die();
        return view('users.edit', ['user' => $user, 'groups' => $groups, 'discounts' => $discounts, 'categories' => $categories, 'userAccess' => $userAccess]);
    }

    
    public function update(UserRequest $request, User  $user)
    {
        $categories = ProductCategories::get();
        $user->update(
            $request->merge(['password' => Hash::make($request->get('password')),'group_id' => $request->group,
                                        'business_name' => $request->businessName,
                                        'post_code' => $request->postCode,
                                        'address' => $request->address,
                                        'phone' => $request->phone,
                                        'lat' => $request->lat,
                                        'lng' => $request->long,
                                        'mobile' => $request->mobile
            ])->except([$request->get('password') ? '' : 'password']
        ));
        foreach($categories as $category){
            if($request->has('cat-'.$category->id)){
                $data = [
                    'user_id' => $user->id,
                    'category_id' => $category->id
                ];

                UserAccess::create($data);
            }
            if(!$request->has('cat-'.$category->id)){
                $data = [
                    'user_id' => $user->id,
                    'category_id' => $category->id
                ];

                UserAccess::where($data)->delete();
            }
        }

        return redirect()->route('user.index')->withStatus(__('User successfully updated.'));
    }

   
    public function destroy(User  $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
