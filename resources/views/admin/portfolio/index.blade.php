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

                            {{-- all portfolio show list here --}}
                            <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Portfolio Name</th>
      <th scope="col">Image</th>
      <th scope="col">Created At</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
      @php($i=1)
      @foreach ($portfolios as $portfolio)
          
     
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$portfolio->portfolio_name}}</td>
      <td><img src="{{asset($portfolio->portfolio_image)}}" alt="" style="width: 100px; height:100px"></td>
      <td>{{$portfolio->created_at->diffForHumans()}}</td>
      <td><a href="{{url('portfolio/edit/'.$portfolio->id)}}" class="btn btn-warning">Edit</a></td>
      <td><a href="{{url('portfolio/delete/'.$portfolio->id)}}" class="btn btn-danger">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
                        </div>
                        <div class="col-sm-6">

                            {{-- Add portfolio from here --}}
<form action="{{route('store.portfolio')}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">portfolio Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="portfolio_name" aria-describedby="emailHelp">
    @error('portfolio_name')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">portfolio image </label>
    <input type="file" class="form-control" name="portfolio_image" id="exampleInputPassword1">
    @error('portfolio_image')
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