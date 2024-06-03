@extends('admin.layouts.app')
@section('content')

      <div class="pagetitle col-6">
        <h1>{{__('Orders')}}</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a></li>
            <li class="breadcrumb-item active">{{__('Orders List')}}</li>
          </ol>
        </nav>
      </div><!-- End Page Title -->
      
      <div class="col-6">
        <!-- <a style="float: right;" href="{{route('orders.create')}}" class="btn btn-primary">Create</a> -->
  </div>
      
    </div>

    <section class="section">
          <div class="row">
                 <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                    <h5 class="card-title"></h5>

                    <!-- Default Table -->
                    <table class="table">
                    <thead>
                    <tr>
                    <th scope="col">{{__('Orders No')}}</th>
                    <th scope="col">{{__('Customer Name')}}</th>
                    <th scope="col">{{__('Name')}}</th>
                    <th scope="col">{{__('Email')}}</th>
                    <th scope="col">{{__('status')}}</th>
                    <th scope="col">{{__('Amount')}}</th>
                    <th scope="col">{{__('Country')}}</th>
                    <th scope="col">{{__('Currency')}}</th>
                    <th scope="col">{{__('Date & Time')}}</th>
                    <th scope="col">{{__('Action')}}</th>
                    </tr>
                    </thead>
                    <tbody>

                    

                    @forelse($orders as $order)
                    <tr>

                    <th scope="row">{{ $order->order_id }}</th>
                    <td>{{ $order->user->name  }}</td>
                    <td>{{ $order->first_name.' '.$order->last_name  }}</td>
                    <td>{{ $order->email }} <span class="badge text-bg-warning">{{ $order->ip_address }}</span></td>
                    <td>
                        <span class="badge {{ $order->status == 0 ? 'text-bg-danger' : 'text-bg-success' }}">
                            {{ $order->status == 0 ? 'Failed' : 'Success' }}
                        </span>
                    </td>
                    <td>{{ $order->amount }}</td>
                    <td>{{ $order->country }}</td>
                    <td>{{ $order->currency }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->transaction_date)->format('d-m-Y / H:i:s') }}</td>
                    <td><button class="btn btn-success">Action</button></td>
                    
                    </tr>
                    @empty
                    Data not found
                   
                    @endforelse
                    </tbody>
                    </table>
                    {{ $orders->links() }}
                    <!-- End Default Table Example -->
                    </div>
                    </div>
                 </div>
          </div>
   </section>

  @endsection