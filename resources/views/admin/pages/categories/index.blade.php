@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Categories List')
{{-- vendor styles --}}
@section('vendor-styles')
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/dataTables.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/responsive.bootstrap4.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('vendors/css/tables/datatable/buttons.bootstrap4.min.css')}}">
@endsection
{{-- page styles --}}
@section('page-styles')
<link rel="stylesheet" type="text/css" href="{{asset('css/pages/app-users.css')}}">
@endsection
@section('content')
<!-- Categories list start -->
<section class="users-list-wrapper">
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
        <div class="col-12 d-flex align-items-center justify-content-end pb-1">
          <a href="{{route('categories.create')}}" class="btn btn-sm btn-success">Add Category</a>
        </div>
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="categories-list-datatable" class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>name</th>
                <th>image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->id}}</td>
                        <td>{{$category->name}}</td>
                        <td><img src="{{Storage::disk('public')->url($category->image)}}" width="45" height="45" alt="{{Storage::disk('public')->url($category->image)}}"></td>
                        <td><a href="{{route('categories.edit',$category)}}"><i class="bx bx-edit-alt"></i></a> | <a onclick="event.preventDefault(); document.getElementById('category-delete-form').submit()"><i class="bx bx-trash-alt danger"></i></a>
                          <form id="category-delete-form" action="{{ route('categories.destroy', $category['id']) }}" method="POST" class="d-none">
                            @method('DELETE')
                            @csrf
                          </form>
                          </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
        <!-- datatable ends -->
      </div>
    </div>
  </div>
</section>
<!-- Categories list ends -->
@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this category ?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Confirm</button>
        </div>
      </div>
    </div>
  </div>
  <!-- End -->
{{-- vendor scripts --}}
@section('vendor-scripts')
<script src="{{asset('vendors/js/tables/datatable/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('vendors/js/tables/datatable/buttons.bootstrap4.min.js')}}"></script>
@endsection

{{-- page scripts --}}
@section('page-scripts')
<script src="{{asset('js/scripts/pages/app-users.js')}}"></script>
@endsection
