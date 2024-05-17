@extends('layouts.app')

@section('content')

<div class="container">

    <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12 col-md-12 d-flex flex-column align-items-center justify-content-center">

                  

                  


                           

                        <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nmae</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @forelse($users as $user)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$user->name}}</td>
      <td>{{$user->email}}</td>
      <td><button class="btn btn-success">action</button></td>
    </tr>
    @empty

    @endforelse
   
  </tbody>
</table>


            </div>
        </div>

    </section>

</div>
@endsection
