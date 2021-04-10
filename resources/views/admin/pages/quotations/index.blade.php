@extends('admin.layouts.contentLayoutMaster')
{{-- page title --}}
@section('title','Quotations List')
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
  <!-- Quotations list start -->
  <section class="users-list-wrapper">
    <div class="users-list-table">
      <div class="card">
        <div class="card-body">
          <!-- datatable start -->
          <div class="table-responsive">
            <table id="Quotations-list-datatable" class="table">
              <thead>
              <tr>
                <th>id</th>
                <th>Company Name</th>
                <th>Contact Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Country</th>
                <th>City</th>
                <th>Address</th>
                <th>AddressStatus</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              @foreach ($quotations as $quotation)
                <tr>
                  <td>{{$quotation->id}}</td>
                  <td>{{$quotation->companyName}}</td>
                  <td>{{$quotation->contactName}}</td>
                  <td>{{$quotation->email}}</td>
                  <td>{{$quotation->mobile}}</td>
                  <td>{{$quotation->country}}</td>
                  <td>{{$quotation->city}}</td>
                  <td>{{$quotation->address}}</td>
                  <td
                    class="@if($quotation->status == 0) bg-danger @elseif($quotation->status ==1) bg-success @else bg-warning @endif">
                    <form id="quotation-update-form" action="{{route('quotations.update', $quotation)}}" method="POST">
                      @method('PUT')
                      @csrf
                      <select name="status" class="form-control"
                      >
                        <option value="{{$quotation->status}}">@if($quotation->status == 0)
                            Pending @elseif($quotation->status == 1) Approved @else Dismissed @endif</option>
                        <option value="1">Approve</option>
                        <option value="2">Dismiss</option>
                      </select>
                    </form>
                  </td>
                  <td><a
                      onclick="event.preventDefault(); document.getElementById('quotation-update-form').submit()"><i
                        class="bx bx-send success"></i></a> | <a
                      onclick="event.preventDefault(); document.getElementById('quotation-delete-form').submit()"><i
                        class="bx bx-trash-alt danger"></i></a>
                    <form id="quotation-delete-form" action="{{ route('quotations.destroy', $quotation['id']) }}"
                          method="POST" class="d-none">
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
  <!-- Quotations list ends -->
@endsection
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
