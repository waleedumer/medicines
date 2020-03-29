@extends('layouts.app', ['title' => __('Product Management')])

@section('content')

    <div class="container-fluid mt-4 ">
        <div class="row">
            <div class="col">
                <!-- <div class="card shadow"> -->
                    <!-- <div class="card-header border-0"> -->
                        <div class="row align-items-center pt-2 pb-3">
                            <div class="col-8">
                                <h2 class="mb-0">{{ __('Latest Products') }}</h2>
                            </div>
                        </div>
                    <!-- </div> -->
                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3">
                                <div class="card shadow">
                                    <div class="card-header border-0 p-0 py-1">
                                        <div class="row align-items-center">
                                            
                                        </div>
                                    </div>
                                    <div class="product-img" style="background: url('{{ asset('storage/images/'.$product->image_url) }}')">
                                        <img src="{{ asset('storage/images/'.$product->image_url) }}" hidden>
                                    </div>
                                    <div class="col-12 py-2">
                                            <a href="#" title="{{$product->name}}"><h4 class="mb-0 pro-name" >{{ str_limit($product->name, $limit = 50, $end = '...' )}}</h4></a>
                                        </div>
                                    <div class="card-footer py-4">
                                        <nav class="d-flex align-items-center" aria-label="...">
                                            <h3 class="m-0 price">{{$product->sale_price}}</h3>
                                            <span class="space"></span>
                                            <button class="btn btn-primary buy-button add-cart" data-id="{{$product->id}}"><i class="fas fa-cart-plus"></i> <span>Buy This</span></button>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    <!-- <div class="card-footer py-4">
                        <nav class="d-flex justify-content-end" aria-label="...">
                            
                        </nav>
                    </div> -->
                <!-- </div> -->
            </div>
        </div>
            
        @include('layouts.footers.auth')
    </div>
@endsection