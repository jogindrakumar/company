@extends('admin.admin_master')
@section('admin_content')

    <div class="py-12">
        {{-- @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
  {{session('success')}}
</div>
@endif --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}

                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">

                            {{-- all contact show list here --}}
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">contact Location</th>
      <th scope="col">Email</th>
      <th scope="col">Contact</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @php($i=1)
      @foreach ($contacts as $contact)
          
     
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$contact->location}}</td>
      <td>{{$contact->email}}</td>
      <td>{{$contact->call}}</td>
      <td>{{$contact->created_at->diffForHumans()}}</td>
      <td><a href="{{url('contact/edit/'.$contact->id)}}" class="btn btn-warning">Edit</a></td>
      <td><a href="{{url('contact/delete/'.$contact->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
                        </div>
                        <div class="col-sm-12">

                            <h2 class="text-center">Add Contact Details</h2>

                            {{-- Add contact from here --}}
<form action="{{route('store.contact')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">contact Location</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="location" aria-describedby="emailHelp">
    @error('location')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email  </label>
    <input type="email" class="form-control" name="email" id="exampleInputPassword1">
    @error('email')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contact  </label>
    <input type="text" class="form-control" name="call" id="exampleInputPassword1">
    @error('call')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection