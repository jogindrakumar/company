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

                            {{-- all service show list here --}}
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">service Name</th>
      <th scope="col">text</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @php($i=1)
      @foreach ($services as $service)
          
     
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$service->service_name}}</td>
      <td>{{$service->service_text}}</td>
      <td>{{$service->created_at->diffForHumans()}}</td>
      <td><a href="{{url('service/edit/'.$service->id)}}" class="btn btn-warning">Edit</a></td>
      <td><a href="{{url('service/delete/'.$service->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
                        </div>
                        <div class="col-sm-6">

                            {{-- Add service from here --}}
<form action="{{route('store.service')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">service Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="service_name" aria-describedby="emailHelp">
    @error('service_name')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">service text </label>
    <input type="text" class="form-control" name="service_text" id="exampleInputPassword1">
    @error('service_text')
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