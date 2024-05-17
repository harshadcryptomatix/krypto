@extends('admin.layouts.app')
@section('content')
    <div class="pagetitle">
      <h1>{{__('Admin List')}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item active">{{__('Admin List')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
    @if (session()->has('error'))
                  <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-octagon me-1"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>
                @endif
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                      <i class="bi bi-check-circle me-1"></i>
                      {{ session('success') }}
                      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
      <div class="row">
        <div class="col-12">
              <a href="{{route('admin.admin-create')}}" class="btn btn-primary admin-button">Add Admin</a>
        </div>
        <div class="col-lg-12">
        
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"></h5>
            
              <!-- Default Table -->
              <table class="table">
                <thead>
                  <tr>
                    <th scope="col">{{__('ID')}}</th>
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Email')}}</th>
                    <th scope="col">{{__('Status')}}</th>
                    <th scope="col">{{__('Created At')}}</th>
                    <th scope="col">{{__('Action')}}</th>
                  </tr>
                </thead>
                <tbody>
                 @foreach($data ?? [] as $key => $value)   
                  <tr>
                    <th scope="row">{{$value->id}}</th>
                    <td>{{$value->name}}</td>
                    <td>{{$value->email}}</td>
                    <td>{{ $value->status == 1 ? "Active" : "Inactive"}}</td>
                    <td>{{$value->created_at}}</td>
                    <td>
                        <a href="{{ route('admin.admin-edit', $value->id) }}">
                           <i class="bi bi-pencil-square"></i>
                       </a>
                       <a href="javascript:void(0)" class="ml-12" data-bs-toggle="modal" data-bs-target="#verticalycentered{{$value->id}}">
                            <i class="bi bi-trash2-fill"></i>
                       </a>
                       <div class="modal fade" id="verticalycentered{{$value->id}}" tabindex="-1">
                        <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title">{{__('Confirmation')}}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                               {{__('Are you sure to delete')}} {{$value->name}}.
                            </div>
                            <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{__('Cancel')}}</button>
                            <form action="{{ route('admin.admin-destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary">{{__('Yes Delete')}}</button>
                            </form>
                            </div>
                        </div>
                        </div>
                    </div><!-- End Vertically centered Modal-->

                </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
              <!-- End Default Table Example -->
              <!-- Pagination Links -->
                <div class="pagination">
                    {{ $data->links() }}
                </div>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection
