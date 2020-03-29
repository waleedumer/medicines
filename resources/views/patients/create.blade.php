@extends('layouts.app', ['title' => __('Patient Management')])

@section('content')
    @include('users.partials.header', ['title' => __('Add Patient')])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-12 order-xl-1">
                <div class="card bg-secondary shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Patient Management') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('patients.index') }}" class="btn btn-sm btn-primary">{{ __('Back to list') }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="{{ route('patients.store') }}" autocomplete="off" enctype="multipart/form-data" >
                            @csrf
                            @foreach($sections as $key => $section)
                            <h6 class="heading-small p-3 bg-light mb-4">{{$section['name']}}</h6>
                            <div class="container">
                                <div class="row">
                                    @foreach($inputs as $input)
                                    @if($input['section'] == $section['controls'])
                                      @foreach($input['controls'] as $formcontrol)
                                        <!-- Simple Text Box -->
                                        @if($formcontrol['type'] == 'text')
                                            <div class="form-group {{$formcontrol['class']}}">
                                                <label class="form-control-label" for="input-name">{{ $formcontrol['label'] }}</label>
                                                <input type="{{$formcontrol['type']}}" name="{{$formcontrol['name']}}" class="form-control"  value="">
                                            </div>
                                        @endif
                                        <!-- Radio Button -->
                                        @if($formcontrol['type'] == 'radio')
                                          <div class="form-group {{$formcontrol['class']}}">
                                            <label class="form-control-label" for="input-name">{{ $formcontrol['label'] }}</label>
                                            <div class="row ml-1">
                                                <div class="custom-control custom-radio mb-3 col-md-3">
                                                  <input name="{{$formcontrol['name']}}" class="custom-control-input" id="customRadio5" type="radio">
                                                  <label class="custom-control-label" for="customRadio5">Yes</label>
                                                </div>
                                                <div class="custom-control custom-radio mb-3 col-md-3">
                                                  <input name="{{$formcontrol['name']}}" class="custom-control-input" id="customRadio6" type="radio">
                                                  <label class="custom-control-label" for="customRadio6">No</label>
                                                </div>
                                            </div>
                                          </div>
                                        @endif
                                        <!-- Checkbox -->
                                        @if($formcontrol['type'] == 'checkbox')
                                          <div class="form-group {{$formcontrol['class']}}">
                                            <div class="custom-control custom-checkbox mb-3">
                                              <input class="custom-control-input" name="{{$formcontrol['name']}}" id="customCheck1" type="checkbox">
                                              <label class="custom-control-label" for="customCheck1">{{ $formcontrol['label'] }}</label>
                                            </div>
                                          </div>
                                        @endif
                                        <!-- Image -->
                                        @if($formcontrol['type'] == 'image')
                                          <div class="form-group {{$formcontrol['class']}}">
                                              <label class="form-control-label" for="input-name">{{ $formcontrol['label'] }}</label>
                                              <input type="file" name="{{$formcontrol['name']}}" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="200" />  
                                          </div>
                                        @endif
                                        <!-- File -->
                                        @if($formcontrol['type'] == 'file')
                                          <div class="form-group {{$formcontrol['class']}}">
                                              <input type="file" name="{{$formcontrol['name']}}" class="dropifyfile" data-height="200" />  
                                          </div>
                                        @endif
                                        <!-- Textarea -->
                                        @if($formcontrol['type'] == 'textarea')
                                          <div class="form-group {{$formcontrol['class']}}">
                                              <textarea name="{{$formcontrol['name']}}" placeholder="Additional Notes for patient....." rows="5" class="form-control"></textarea>  
                                          </div>
                                        @endif
                                      @endforeach
                                    @endif
                                    @endforeach
                                </div>
                                <!-- <div class="images-wrapper">
                                    <div class="row images">
                                        <div class="form-group col-md-2">
                                            <label class="form-control-label" >{{ __('Product Cover Image') }}</label>
                                            <input type="file" name="coverImage" accept="image/x-png,image/jpeg,image/jpg" class="dropify" data-height="100" />
                                        </div>
                                    </div>
                                </div> -->
                            </div>
                            @endforeach
                            <div class="text-right">
                                <button type="submit" class="btn btn-success mt-4">{{ __('Save') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <script>
            $('.dropify').dropify({
                messages: {
                    'default': 'Upload an Image file',
                    'replace': 'Drag and drop or click to replace',
                    'remove':  'Remove',
                    'error':   'Ooops, something wrong happended.'
                }
            });

            $('.dropifyfile').dropify({
                messages: {
                    'default': 'Upload your files here',
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
