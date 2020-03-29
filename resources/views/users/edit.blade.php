@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit User')])   

    <div class="container-fluid mt--7">
        <form method="post" action="{{ route('user.update', $user) }}" autocomplete="off">
            <div class="row">
        
                            @csrf
                            @method('put')
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <!-- Can aCCESS -->
                    <div class="card card-profile shadow mb-3">
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-0">
                            <div class="d-flex justify-content-between">
                                <h3>Can Access</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                <div class="row px-2">
                                        @foreach($categories as $category)
                                            <?php $access = \App\Models\UserAccess::where('user_id', $user->id)->where('category_id' , $category->id)->get(); 
                                                if($access->isEmpty()) {
                                                    $checked = 'false';
                                                }
                                                else{
                                                    $checked = 'checked';
                                                }
                                            ?>
                                                <div class="custom-control custom-checkbox mb-3 col-lg-6 col-6">
                                                    <input class="custom-control-input" id="{{$category->id}}" <?php echo $checked; ?> name="cat-{{ $category->id }}" value="{{ $category->id }}"  type="checkbox">
                                                    <label class="custom-control-label" for="{{$category->id}}">{{ ucfirst($category->name) }}</label>
                                                </div>
                                            
                                        @endforeach
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Discounts -->
                    <div class="card card-profile shadow mb-3">
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-0">
                            <div class="d-flex justify-content-between">
                                <h3>Discounts</h3>
                                <div class="text-right">
                                    <a href="{{ URL::to('discount/create') }}" class="btn btn-sm btn-warning">Add Discount</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-0">
                            <div class="row">
                                <div class="col">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($discounts as $discount)
                                            <tr>
                                                <td>{{$discount->product['name']}}</td>
                                                <td>{{ $discount->amount }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                     <!-- Location -->
                     <div class="card card-profile shadow mb-3">
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <h3>Location</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row">
                                <div class="col">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">{{ __('User Management') }}</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            

                                <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                            <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', $user->name) }}" required autofocus>

                                            @if ($errors->has('name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                            <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', $user->email) }}" required>

                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        
                                        <div class="form-group col-md-6">
                                                <label class="form-control-label">{{ __('Address') }}</label>  
                                                <textarea type="text" name="address" id="input-name" class="form-control" row="2" required>{{$user->address}}</textarea>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label class="form-control-label">{{ __('Business Name') }}</label>  
                                                <input type="text" name="businessName" class="form-control" value="{{$user->business_name}}">
                                            </div>
                                        
                                    </div>
                                    <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label class="form-control-label" for="input-email">{{ __('User Group') }}</label>
                                                    <select class="form-control" name="group">
                                                    <?php $groupIn = \App\Models\Groups::find($user->group_id);?>
                                                        <option value="{{$groupIn->id}}">{{$groupIn->name}}</option>
                                                        @foreach($groups as $group)
                                                        @if($group->id !== $user->group_id)
                                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-control-label">{{ __('Post Code') }}</label>  
                                                    <input type="text" name="postCode" class="form-control" required value="{{$user->post_code}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-control-label">{{ __('Latitude') }}</label>  
                                                    <input type="text" name="lat" class="form-control" value="{{$user->lat}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-control-label">{{ __('Longitude') }}</label>  
                                                    <input type="text" name="long" class="form-control" value="{{$user->lng}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-control-label">{{ __('Phone') }}</label>  
                                                    <input type="text" name="phone" class="form-control" value="{{$user->phone}}">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label class="form-control-label">{{ __('Mobile') }}</label>  
                                                    <input type="text" name="mobile" class="form-control" required value="{{$user->mobile}}">
                                                </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col-md-6">
                                            <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                            <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="">
                                            
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                            <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="">
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @include('layouts.footers.auth')
    </div>
@endsection