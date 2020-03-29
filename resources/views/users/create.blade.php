@extends('layouts.app', ['title' => __('User Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add User')])   

    <div class="container-fluid mt--4">
    <form method="post" action="{{ route('user.store') }}" autocomplete="off">
        <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0 d-none">
                    <!-- Discounts -->
                    <!-- <div class="card card-profile shadow mb-3">
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <h3>Discounts</h3>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-0 p-0 p-3">
                            
                                    <div class="products row">
                                                        <select class="form-control select-products col-md-6" name="product" required>
                                                            <option></option>
                                                            @foreach($products as $product)
                                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                                            @endforeach
                                                        </select>
                                                        <input id="amount" name="amount" class="form-control col-md-6" type="text" placeholder="Amount">
                                                    </div>
                                <div class="row">
                                    <table class="table table-light table-striped special-table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <p class=" m-0 p-0 ml-2" ><small>{{ __('Product') }}</small></p>
                                                    
                                                </th>
                                                <th>
                                                    <p class=" m-0 p-0 ml-2"><small>Amount</small></p>
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            
                        </div>
                    </div> -->
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

                                            <div class="custom-control custom-checkbox mb-3 col-lg-6 col-6">
                                                <input class="custom-control-input" id="{{$category->id}}" name="cat-{{ $category->id }}" value="{{ $category->id }}"  type="checkbox">
                                                <label class="custom-control-label" for="{{$category->id}}">{{ ucfirst($category->name) }}</label>
                                            </div>
                                        @endforeach
                                        </div>
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
            <div class="col-xl-12">
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
                        
                            @csrf
                            
                            <h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-md-12" style="border-right: solid;border-width:1px;">
                                        <div class="row">
                                            <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} col-md-6">
                                                <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                                <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name') }}" required autofocus>

                                                @if ($errors->has('name'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('name') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} col-md-6">
                                                <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                                <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email') }}" required>

                                                @if ($errors->has('email'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }} col-md-6">
                                                <label class="form-control-label" for="input-password">{{ __('Password') }}</label>
                                                <input type="password" name="password" id="input-password" class="form-control form-control-alternative{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" value="" required>
                                                
                                                @if ($errors->has('password'))
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                            <div class="form-group col-md-6">
                                                <label class="form-control-label" for="input-password-confirmation">{{ __('Confirm Password') }}</label>
                                                <input type="password" name="password_confirmation" id="input-password-confirmation" class="form-control form-control-alternative" placeholder="{{ __('Confirm Password') }}" value="" required>
                                            </div>
                                            
                                            <div class="form-group col-md-6">
                                                <label class="form-control-label">{{ __('Address') }}</label>  
                                                <textarea type="text" name="address" id="input-name" class="form-control" row="2" required></textarea>
                                            </div>

                                            <div class="form-group col-md-6 d-none">
                                                <label class="form-control-label">{{ __('Business Name') }}</label>  
                                                <input type="text" name="businessName" class="form-control">
                                            </div>
                                            
                                        </div>
                                        <div class="row">
                                                    <div class="form-group col-md-4 d-none">
                                                        <label class="form-control-label" for="input-email">{{ __('User Group') }}</label>
                                                        <select class="form-control" name="group">
                                                            <option></option>
                                                            @foreach($groups as $group)
                                                            <option value="{{$group->id}}">{{$group->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label">{{ __('Post Code') }}</label>  
                                                        <input type="text" name="postCode" class="form-control" required>
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label">{{ __('Latitude') }}</label>  
                                                        <input type="text" name="lat" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label">{{ __('Longitude') }}</label>  
                                                        <input type="text" name="long" class="form-control">
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label">{{ __('Phone') }}</label>  
                                                        <input type="text" name="phone" class="form-control" >
                                                    </div>
                                                    <div class="form-group col-md-4">
                                                        <label class="form-control-label">{{ __('Mobile') }}</label>  
                                                        <input type="text" name="mobile" class="form-control" required>
                                                    </div>
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-4">
                                        <h3>Can Access</h3>
                                        
                                    </div> -->
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
        </form>
        <script>

$('#amount').on('keyup',function(e){
                if(e.which == 13){
                    var user = $('.select-users option:selected').text();
                    var userId = $('.select-users').val();
                    var product = $('.select-products option:selected').text();
                    var productId = $('.select-products').val();
                    var amount = $(this).val();
                    var row = '<tr><td hidden>'+userId+'</td><td hidden>'+productId+'</td><td>'+product+'</td><td>'+amount+'<i class="fa fa-trash text-danger remove-item float-right"></i></td></tr>'
                    $('.special-table').find('tbody').append(row);
                    $(this).val('');
                    $('.select-products').val(null).trigger('change');
                }
            })
            $(document).on('click', '.remove-item', function(){
                $(this).closest('tr').remove();
            })
            $('#save-discount').click(function(){
                var TableData = new Array();
                $('.special-table tr').each(function (row, tr) {
                    TableData[row] = {
                        "user_id": $(tr).find('td:eq(0)').text(),
                        "product_id": $(tr).find('td:eq(2)').text(),
                        "amount": $(tr).find('td:eq(4)').text(),
                    }
                })
                TableData.shift();
                // console.log(TableData);
                $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
                });
                $.ajax({
                    type: 'get',
                  url: "{{ URL::to('discount/store') }}",
                  data: {
                     tableData: TableData
                  },
                  success: function(result){
                     console.log(result);
                  }});
               });
</script>
        @include('layouts.footers.auth')
    </div>
@endsection
