@extends('admin.admin_master')
@section('admin_content')

    <div class="py-12">
        @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
  {{session('success')}}
</div>
@endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                {{-- <x-jet-welcome /> --}}

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">

                            {{-- all contact show list here --}}
                        
                        </div>
                        <div class="col-sm-6">

                            {{-- Add contact from here --}}
<form action="{{url('contact/update/'.$contacts->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">contact Location</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="location" value="{{$contacts->location}}" aria-describedby="emailHelp">
    @error('location')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email  </label>
    <input type="email" class="form-control" name="email" value="{{$contacts->email}}" id="exampleInputPassword1">
    @error('email')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
    <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Contact  </label>
    <input type="text" class="form-control" name="call" value="{{$contacts->call}}" id="exampleInputPassword1">
    @error('call')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
 
  <button type="submit" class="btn btn-warning">Update</button>
</form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection