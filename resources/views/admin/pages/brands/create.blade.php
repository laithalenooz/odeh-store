@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Brands Create')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/plugins/forms/validation/form-validation.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/forms/select/select2.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/pickers/pickadate/pickadate.css')}}">
@endsection

{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection

@section('content')
<!-- Brands create start -->
<section class="users-edit mt-5">
  <div class="card">
    <div class="card-body">
      <div class="tab-content">
        <div class="tab-pane active fade show" id="account" aria-labelledby="account-tab" role="tabpanel">
            <!-- Brands form start -->
            <form action="{{route('brands.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('POST')
                <div class="row">
                  <div class="col-12 col-sm-4">
                      <div class="form-group">
                        <div class="controls">
                            <label>Brand Name</label>
                            <input value="{{old('name')}}" required class="form-control" placeholder="Brand Name" name="name">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>
                  <div class="col-12 col-sm-10">
                      <div class="form-group">
                        <div class="controls">
                            <label>About the Brand</label>
                            <textarea value="{{old('about')}}" class="ckeditor" required class="form-control" placeholder="Abou the Brand" name="about"></textarea>
                            @if ($errors->has('about'))
                                <span class="text-danger">{{ $errors->first('about') }}</span>
                            @endif
                        </div>
                      </div>
                  </div>
                  <div class="col-12 col-sm-6">
                    <div class="form-group">
                      <div class="controls">
                        <label>Image</label>
                        <input type="file" class="form-control" placeholder="IMAGE" name="image">
                        @if ($errors->has('image'))
                          <span class="text-danger">{{ $errors->first('image') }}</span>
                        @endif
                      </div>
                    </div>
                  </div>
                  <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                      <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-0 mr-sm-1">Save
                        changes</button>
                      <button type="reset" class="btn btn-light">Cancel</button>
                  </div>
                </div>
            </form>
            <!-- Brands form ends -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Brands ends -->
@endsection

{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/forms/select/select2.full.min.js')}}"></script>
<script src="{{asset('vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.js')}}"></script>
<script src="{{asset('vendors/js/pickers/pickadate/picker.date.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.ckeditor').ckeditor();
    });
</script>
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
<script src="{{asset('js/scripts/navs/navs.js')}}"></script>
@endsection
