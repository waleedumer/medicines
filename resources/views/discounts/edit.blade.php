@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Product')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('User Product') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ route('products.store') }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Product information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control"  value="" required autofocus>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{{ __('Description') }}</label>
                                        <input type="text" name="description" class="form-control"  value="" required >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label">{{ __('Product Code') }}</label>
                                        <input type="text" name="productCode" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Purchase Price') }}</label>
                                        <input type="text" name="purchase_price" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Sale Price') }}</label>
                                        <input type="text" name="sale_price" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Purchase VAT') }}</label>
                                        <input type="text" name="purchase_vat" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Sale VAT') }}</label>
                                        <input type="text" name="sale_vat" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Brand') }}</label>
                                        <select class="form-control" name="brand" required>
                                            <option></option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('Category') }}</label>
                                        <select class="form-control" name="category" required>
                                            <option></option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-control-label" >{{ __('On Hand Quantity') }}</label>
                                        <input type="text" name="quantity" class="form-control"  value="" >
                                    </div>
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        @include('layouts.footers.auth')
    </div>
@endsection