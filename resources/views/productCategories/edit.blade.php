@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Edit Category')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Product Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('user.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                    <form method="post" action="{{ URL::to('categories/update/'. $category->id) }}" autocomplete="off">
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('Category information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-4 offset-md-4">
                                        <div class="form-group col-md-12">
                                            <label class="form-control-label">{{ __('Name') }}</label>
                                            <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="{{ __('Name') }}"  required autofocus>
                                        </div>
                                        <div class="form-group col-md-12">
                                            <label class="form-control-label" >{{ __('Type') }}</label>
                                            <input type="text" name="type"  class="form-control" value="{{$category->type}}" placeholder="{{ __('Email') }}" >
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Update') }}</button>
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