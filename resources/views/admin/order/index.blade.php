@extends('admin.layouts.app')
@section('content')
<style type="text/css">
  .modal-dialog {
    max-width: 80%;
}

.table-split {
    display: flex;
    justify-content: space-between;
}

.table-split .col {
    width: 48%;
}
</style>
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
                    <td>{{ $order->currency }}</td>
                    <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $order->transaction_date)->format('d-m-Y / H:i:s') }}</td>
                    <td><button type="button" class="btn btn-primary admin-order-data" data-bs-toggle="modal"
              data-bs-target="#exampleModal" data-id="{{ $order->id }}" >View</button></td>
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

   <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="table-split">
          <div class="col">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">Order Id</th>
                  <td id="order_id"></td>
                </tr>
                <tr>
                  <th scope="row">Session Id</th>
                  <td id="session_id"></td>
                </tr>
                <tr>
                  <th scope="row">Gateway Id</th>
                  <td id="gateway_id"></td>
                </tr>
                <tr>
                  <th scope="row">First Name</th>
                  <td id="first_name"></td>
                </tr>
                <tr>
                  <th scope="row">Last Name</th>
                  <td id="last_name"></td>
                </tr>
                <tr>
                  <th scope="row">Address</th>
                  <td id="address"></td>
                </tr>
                <tr>
                  <th scope="row">Customer Order Id</th>
                  <td id="customer_order_id"></td>
                </tr>
                <tr>
                  <th scope="row">Country</th>
                  <td id="country"></td>
                </tr>
                <tr>
                  <th scope="row">State</th>
                  <td id="state"></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="col">
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">City</th>
                  <td id="city"></td>
                </tr>
                <tr>
                  <th scope="row">Zip</th>
                  <td id="zip"></td>
                </tr>
                <tr>
                  <th scope="row">IP Address</th>
                  <td id="ip_address"></td>
                </tr>
                <tr>
                  <th scope="row">Email</th>
                  <td id="email"></td>
                </tr>
                <tr>
                  <th scope="row">Phone Number</th>
                  <td id="phone_no"></td>
                </tr>
                <tr>
                  <th scope="row">Amount</th>
                  <td id="amount"></td>
                </tr>
                <tr>
                  <th scope="row">Currency</th>
                  <td id="currency"></td>
                </tr>
                <tr>
                  <th scope="row">Card No</th>
                  <td id="card_no"></td>
                </tr>
                <tr>
                  <th scope="row">Status</th>
                  <td id="status"></td>
                </tr>
                <tr>
                  <th scope="row">Response URL</th>
                  <td id="response_url"></td>
                </tr>
                <tr>
                  <th scope="row">Webhook URL</th>
                  <td id="webhook_url"></td>
                </tr>
                <tr>
                  <th scope="row">Transaction Date</th>
                  <td id="transaction_date"></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

  @endsection