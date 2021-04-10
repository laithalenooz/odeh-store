@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Partners List')
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
<!-- Partners list start -->
<section class="users-list-wrapper">
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
        <div class="col-12 d-flex align-items-center justify-content-end pb-1">
          <a href="{{route('partners.create')}}" class="btn btn-sm btn-success">Add a Partner</a>
        </div>
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="Partners-list-datatable" class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>Name</th>
                <th>About</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($partners as $partner)
                    <tr>
                        <td>{{$partner->id}}</td>
                        <td>{{$partner->name}}</td>
                        <td>{{$partner->about}}</td>
                        <td><img src="{{Storage::disk('public')->url($partner->image)}}" width="45" height="45" alt="{{Storage::disk('public')->url($partner->image)}}"></td>
                        <td><a href="{{route('partners.edit', $partner)}}"><i class="bx bx-edit-alt"></i></a> | <a onclick="event.preventDefault(); document.getElementById('brand-delete-form').submit()"><i class="bx bx-trash-alt danger"></i></a>
                          <form id="brand-delete-form" action="{{ route('partners.destroy', $partner['id']) }}" method="POST" class="d-none">
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
<!-- Partners list ends -->
@endsection
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Delete setting</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this setting ?
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
