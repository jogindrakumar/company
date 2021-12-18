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

                            {{-- all brand show list here --}}
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Heading One</th>
      <th scope="col">Heading Two</th>
      <th scope="col">Text one</th>
      <th scope="col">List one</th>
      <th scope="col">List two</th>
      <th scope="col">List three</th>
      <th scope="col">Text two</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @php($i=1)
      @foreach ($abouts as $about)
          
     
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$about->heading_one}}</td>
      <td>{{$about->heading_two}}</td>
      <td>{{$about->text_one}}</td>
      <td>{{$about->list_one}}</td>
      <td>{{$about->list_two}}</td>
      <td>{{$about->list_three}}</td>
      <td>{{$about->text_two}}</td>
     
      <td>{{$about->created_at->diffForHumans()}}</td>
      <td><a href="{{url('about/edit/'.$about->id)}}" class="btn btn-warning">Edit</a></td>
      <td><a href="{{url('about/delete/'.$about->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
                        </div>
                        <div class="col-sm-12">
                            <h2 class="text-center">About</h2>

                            {{-- Add brand from here --}}
<form action="{{route('store.about')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Heading one</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="heading_one" aria-describedby="emailHelp">
    @error('heading_one')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Heading two</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="heading_two" aria-describedby="emailHelp">
    @error('heading_two')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Text one</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="text_one" aria-describedby="emailHelp">
    @error('text_one')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">List One</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="list_one" aria-describedby="emailHelp">
    @error('list_one')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">list two</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="list_two" aria-describedby="emailHelp">
    @error('list_two')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">list three</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="list_three" aria-describedby="emailHelp">
    @error('list_three')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">text two</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="text_two" aria-describedby="emailHelp">
    @error('text_two')
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