@extends('layouts.app', ['title' => __('Discoun Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Give Discount')])   

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Discount Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addVariation">{{ __('Add Variation') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body p-0">
                            <div class="px-3">
                                <div class="row">
                                    <table class="table table-light table-striped special-table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    <p class="form-control-label m-0 p-0 ml-2" >{{ __('User') }}</p>
                                                    <select class="form-control select-users" name="user" required>
                                                        <option></option>
                                                        @foreach($users as $user)
                                                        <option value="{{$user->id}}">{{$user->name}}</option>
                                                        @endforeach
                                                    </select>
                                                </th>
                                                <th>
                                                    <p class="form-control-label m-0 p-0 ml-2" >{{ __('Product') }}</p>
                                                    <div class="products">
                                                        <select class="form-control select-products" name="product" required>
                                                            <option></option>
                                                            @foreach($products as $product)
                                                            <option value="{{$product->id}}">{{$product->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                </th>
                                                <th>
                                                    <p class="form-control-label m-0 p-0 ml-2">Amount</p>
                                                    <input id="amount" name="amount" class="form-control" type="text">
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right mb-3">
                                    <button type="submit" id="save-discount" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script>
            $('.dropify').dropify({
                messages: {
                    'default': 'Product Image',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });

            $('#amount').on('keyup',function(e){
                if(e.which == 13){
                    var user = $('.select-users option:selected').text();
                    var userId = $('.select-users').val();
                    var product = $('.select-products option:selected').text();
                    var productId = $('.select-products').val();
                    var amount = $(this).val();
                    var row = '<tr><td hidden>'+userId+'</td><td>'+user+'</td><td hidden>'+productId+'</td><td>'+product+'</td><td>'+amount+'<i class="fa fa-trash text-danger remove-item float-right"></i></td></tr>'
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