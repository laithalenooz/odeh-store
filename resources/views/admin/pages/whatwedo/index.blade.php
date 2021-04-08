@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','settings List')
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
<!-- settings list start -->
<section class="users-list-wrapper">
  <div class="users-list-table">
    <div class="card">
      <div class="card-body">
        <div class="col-12 d-flex align-items-center justify-content-end pb-1">
          <a href="{{route('whatwedo.create')}}" class="btn btn-sm btn-success">Create</a>
        </div>
        <!-- datatable start -->
        <div class="table-responsive">
          <table id="settings-list-datatable" class="table">
            <thead>
              <tr>
                <th>id</th>
                <th>What We Do</th>
                <th>We Sell</th>
                <th>We Buy</th>
                <th>Image</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($whatwedos as $whatwedo)
                    <tr>
                        <td>{{$whatwedo->id}}</td>
                        <td>{{$whatwedo->whatWeDo}}</td>
                        <td>{{$whatwedo->weSell}}</td>
                        <td>{{$whatwedo->weBuy}}</td>
                        <td><img src="{{Storage::disk('public')->url($whatwedo->image)}}" width="45" height="45" alt="{{Storage::disk('public')->url($whatwedo->image)}}"></td>
                        <td><a href="{{route('whatwedo.edit', $whatwedo)}}"><i class="bx bx-edit-alt"></i></a> | <a onclick="event.preventDefault(); document.getElementById('setting-delete-form').submit()"><i class="bx bx-trash-alt danger"></i></a>
                          <form id="setting-delete-form" action="{{ route('whatwedo.destroy', $whatwedo['id']) }}" method="POST" class="d-none">
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
<!-- settings list ends -->
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
