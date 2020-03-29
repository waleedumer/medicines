@extends('layouts.app', ['title' => __('Product Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Product')])

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
                                <a href="{{ route('products.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addVariationModal">{{ __('Add Variation') }}</button>
                                <button class="btn btn-sm btn-warning" data-toggle="modal" data-target="#addVariationValueModal">{{ __('Add Value') }}</button>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('products.store') }}" autocomplete="off" enctype="multipart/form-data" >
                            @csrf

                            <h6 class="heading-small text-muted mb-4">{{ __('Product information') }}</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <!-- Name -->
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control"  value="" required autofocus>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label">{{ __('Description') }}</label>
                                        <input type="text" name="description" class="form-control"  value="" required >
                                    </div>
                                    <div class="form-group col-md-4">
                                        <div class="d-flex">
                                            <div style="display:grid;" class="">
                                                <label class="form-control-label">Variations</label>
                                                <label class="custom-toggle">
                                                    <input type="checkbox" id="variationCheck" name="variations" value="1">
                                                    <span class="custom-toggle-slider rounded-circle"></span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12" id="variable" hidden>
                                        <h3>Variations</h3>
                                        <hr class="my-2">
                                        <div class="row">
                                          <div class="col-md-3">
                                            <label class="form-control-label" >{{ __('Select Variation') }}</label>
                                            <div class="d-flex">
                                              <select disabled class="form-control" id="slectVariation" name="selectVariation" required>
                                                  <option></option>
                                                  @foreach($variations as $variation)
                                                  <option value="{{$variation->id}}">{{$variation->name}}</option>
                                                  @endforeach
                                              </select>
                                              <select disabled class="form-control" id="selectValue" name="variationValue" required>
                                                  <option></option>
                                              </select>
                                              <a href="#" id="addVariation" class="btn btn-primary btn-xs"><i class="fas fa-plus"></i></a>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="row-variation mt-3">
                                          <!-- <div class="row mb-2">
                                            <div class="col-md-12">
                                              <h3 class="m-0 p-1 bg-light">Color</h3>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="d-flex">
                                                  <div class="form-group mb-0">
                                                    <label class="form-control-label" >{{ __('Value') }}</label>
                                                    <input class="form-control" name="color">
                                                  </div>
                                                  <div class="form-group mb-0">
                                                    <label class="form-control-label" >{{ __('Purchase Price') }}</label>
                                                    <input class="form-control" name="color">
                                                  </div>
                                                  <div class="form-group mb-0">
                                                    <label class="form-control-label" >{{ __('Sale Price') }}</label>
                                                    <input class="form-control" name="color">
                                                  </div>
                                                  <div class="form-group mb-0">
                                                    <label class="form-control-label" >{{ __('On Hand Quantity') }}</label>
                                                    <input class="form-control" name="color">
                                                  </div>
                                                </div>
                                            </div>
                                          </div> -->
                                        </div>
                                        <hr class="my-3">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label">{{ __('Product Code') }}</label>
                                        <input type="text" name="productCode" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-4 purchase-normal">
                                        <label class="form-control-label">{{ __('Purchase Price') }}</label>
                                        <input type="text" name="purchase_price" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-4 sale-normal">
                                        <label class="form-control-label" >{{ __('Sale Price') }}</label>
                                        <input type="text" name="sale_price" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label" >{{ __('Purchase VAT') }}</label>
                                        <input type="text" name="purchase_vat" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label" >{{ __('Sale VAT') }}</label>
                                        <input type="text" name="sale_vat" class="form-control"  value="" required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label" >{{ __('Brand') }}</label>
                                        <select class="form-control" name="brand" required>
                                            <option></option>
                                            @foreach($brands as $brand)
                                            <option value="{{$brand->id}}">{{$brand->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label class="form-control-label" >{{ __('Category') }}</label>
                                        <select class="form-control" name="category" required>
                                            <option></option>
                                            @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 quantity-normal">
                                        <label class="form-control-label" >{{ __('On Hand Quantity') }}</label>
                                        <input type="text" name="quantity" class="form-control"  value="" >
                                    </div>
                                </div>
                                <div class="images-wrapper">
                                    <div class="row images">
                                        <div class="form-group col-md-2">
                                            <label class="form-control-label" >{{ __('Product Cover Image') }}</label>
                                            <input type="file" name="coverImage" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="form-control-label" >{{ __('Gallery Image') }}</label>
                                            <input type="file" name="imageOne" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="form-control-label" >{{ __('Gallery Image') }}</label>
                                            <input type="file" name="imageTwo" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                        </div>
                                        <div class="form-group col-md-2">
                                            <label class="form-control-label" >{{ __('Gallery Image') }}</label>
                                            <input type="file" name="imageThree" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="addVariationValueModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    <form method="post" action="{{ route('products.variation.value.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-2">{{ __('Add New Variation') }}</h6>

                                <div class="row">
                                    <!-- Name -->
                                    <div class="form-group col-md-6 mb-1">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <!-- <input type="text" name="name" id="input-name" class="form-control"  value="" required autofocus> -->
                                        <select class="form-control" id="slectVariation" name="name" required>
                                            <option></option>
                                            @foreach($variations as $variation)
                                            <option value="{{$variation->id}}">{{$variation->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6 mb-1">
                                        <label class="form-control-label" for="input-name">{{ __('Value') }}</label>
                                        <input type="text" name="value"  class="form-control"  value="" required>
                                    </div>

                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success w-100 ">{{ __('Save') }}</button>
                                </div>

                    </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="addVariationModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                    <form method="post" action="{{ route('products.variation.store') }}" autocomplete="off">
                            @csrf
                            <h6 class="heading-small text-muted mb-2">{{ __('Add New Variation') }}</h6>

                                <div class="row">
                                    <!-- Name -->
                                    <div class="form-group col-md-12 mb-1">
                                        <label class="form-control-label" for="input-name">{{ __('Name') }}</label>
                                        <input type="text" name="name" id="input-name" class="form-control"  value="" required autofocus>
                                    </div>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" class="btn btn-success w-100 ">{{ __('Save') }}</button>
                                </div>

                    </form>
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

            $('#variationCheck').change(function(){
              if($(this).prop('checked') == true){
                $('#variable').removeAttr('hidden')
                $('#variable').find('select').each(function(){
                  $(this).removeAttr('disabled');
                })
                $('.purchase-normal').attr('hidden', 'true')
                $('.purchase-normal').find('input').attr('disabled', 'true')
                $('.sale-normal').attr('hidden', 'true')
                $('.sale-normal').find('input').attr('disabled', 'true')
                // $('.images').attr('hidden', 'true')
                $('.quantity-normal').attr('hidden', 'true')
                $('.quantity-normal').find('input').attr('disabled', 'true')
              }
              else{
                $('#variable').attr('hidden', 'true')
                $('#variable').find('select').each(function(){
                  $(this).attr('disabled', 'true');
                })
                $('.purchase-normal').removeAttr('hidden')
                $('.purchase-normal').find('input').removeAttr('disabled')
                $('.sale-normal').removeAttr('hidden')
                $('.sale-normal').find('input').removeAttr('disabled')
                // $('.images').removeAttr('hidden')
                $('.quantity-normal').removeAttr('hidden')
                $('.quantity-normal').find('input').removeAttr('disabled')
              }
            })

            $('#slectVariation').change(function(){
              var variation = $(this).val();
              $.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                  }
              });

              jQuery.ajax({
                  url: "{{ URL::to('products/get/values') }}",
                  method: 'get',
                  data: {
                    variation: variation
                  },
                  success: function(result){
                    $('#selectValue').html('');
                    $('#selectValue').append('<option></option>');
                    $.each(result, function(i, val){
                      $('#selectValue').append('<option value="'+val.id+'">'+val.value+'</option>')
                    })
                  }});
            })

            $('#addVariation').click(function(){
                var variationSelected = $('#slectVariation option:selected').text();
                var valueSelected = $('#selectValue option:selected').text();
                 var vary = '<div class="row mb-2">'+
                                            '<div class="col-md-12">'+
                                              '<h5 class="m-0 p-1 bg-light pr-2">'+variationSelected+':'+valueSelected+'<span class="float-right"><i data-image="#'+variationSelected+'-images" class="remove-variation fas fa-times text-red"></i></span></h5>'+
                                            '</div>'+
                                            '<div class="row w-100">'+
                                              '<div class="col-md-8">'+
                                                '<div class="col-md-12">'+
                                                    '<div class="d-flex">'+
                                                      '<div class="form-group mb-0 w-100">'+
                                                        '<label class="form-control-label" >Sale Price</label>'+
                                                        '<input class="form-control" name="'+variationSelected+valueSelected+'Sale">'+
                                                      '</div>'+
                                                      '<div class="form-group mb-0 w-100">'+
                                                        '<label class="form-control-label" >Purchase Price</label>'+
                                                        '<input class="form-control" name="'+variationSelected+valueSelected+'Purchase">'+
                                                      '</div>'+
                                                      '<div class="form-group mb-0 w-100">'+
                                                        '<label class="form-control-label" >On Hand Quantity</label>'+
                                                        '<input class="form-control" name="'+variationSelected+valueSelected+'Quantity">'+
                                                      '</div>'+
                                                    '</div>'+
                                                '</div>'+
                                              '</div>'+
                                              '<div class="col-md-2">'+
                                                '<label class="form-control-label" >{{ __('Variation Image') }}</label>'+
                                                '<input type="file" name="'+variationSelected+valueSelected+'CoverImage" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />'+
                                              '</div>'+
                                            '</div>'+
                                          '</div>';
                  var variationImages = '<div class="row images" id="'+variationSelected+'-images">'+
                                            '<div class="col-md-12">'+
                                              '<h5 class="m-0 p-1 bg-light pr-2">'+variationSelected+'<span class="float-right"><i class="remove-variation fas fa-times text-red"></i></span></h5>'+
                                            '</div>'+
                                            '<div class="form-group col-md-2">'+
                                              '<label class="form-control-label" >{{ __('Product Cover Image') }}</label>'+
                                              '<input type="file" name="'+variationSelected+'CoverImage" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />'+
                                            '</div>'+
                                            '<div class="form-group col-md-2">'+
                                              '<label class="form-control-label" >{{ __('Gallery Image') }}</label>'+
                                              '<input type="file" name="'+variationSelected+'ImageOne" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />'+
                                            '</div>'+
                                            '<div class="form-group col-md-2">'+
                                              '<label class="form-control-label" >{{ __('Gallery Image') }}</label>'+
                                              '<input type="file" name="'+variationSelected+'ImageTwo" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />'+
                                            '</div>'+
                                            '<div class="form-group col-md-2">'+
                                              '<label class="form-control-label" >{{ __('Gallery Image') }}</label>'+
                                              '<input type="file" name="'+variationSelected+'ImageThree" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />'+
                                            '</div>'+
                                        '</div>'
                  if(variationSelected){
                      $('.row-variation').append(vary);
                      // $('.images-wrapper').append(variationImages);
                      $('.dropify').dropify();
                  }
            })

            $(document).on('click','.remove-variation',function(){
              $(this).closest('.row').remove();
              var varyImages = $(this).data('image');
              console.log(varyImages);

              $('div'+varyImages).remove();
            })
        </script>
        @include('layouts.footers.auth')
    </div>

@endsection
