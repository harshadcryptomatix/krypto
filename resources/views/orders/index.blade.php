@extends('layouts.app')
@section('content')
  <main id="main" class="main">
    <div class="pagetitle">
      <h1>{{__('Orders')}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">{{__('Home')}}</a></li>
          <li class="breadcrumb-item active">{{__('Orders List')}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
          <div class="row">
                <div class="col-12 mb-4">
                      <a style="float: right;" href="{{route('orders.create')}}" class="btn btn-primary">Create</a>
                </div>
                 <div class="col-12">
                    <div class="card">
                    <div class="card-body">
                    <h5 class="card-title"></h5>

                    <!-- Default Table -->
                    <table class="table">
                    <thead>
                    <tr>
                    <th scope="col">Order No</th>
                    <th scope="col">First Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Country</th>
                    <th scope="col">Currency</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                    <th scope="row">1</th>
                    <td>Brandon</td>
                    <td>Jacob</td>
                    <td>IND</td>
                    <td>INR</td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                    <td>Bridie</td>
                    <td>Kessler</td>
                    <td>US</td>
                    <td>USD</td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                    <td>Ashleigh</td>
                    <td>Langosh</td>
                    <td>UK</td>
                    <td>EURO</td>
                    </tr>
                    <tr>
                    <th scope="row">4</th>
                    <td>Angus</td>
                    <td>Grady</td>
                    <td>AUS</td>
                    <td>AUD</td>
                    </tr>
                    <tr>
                    <th scope="row">5</th>
                    <td>Raheem</td>
                    <td>Lehner</td>
                    <td>US</td>
                    <td>USD</td>
                    </tr>
                    </tbody>
                    </table>
                    <!-- End Default Table Example -->
                    </div>
                    </div>
                 </div>
          </div>
   </section>
  </main> 
  @endsection