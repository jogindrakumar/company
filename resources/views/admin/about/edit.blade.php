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

                            {{-- all brand show list here --}}
                           
                        </div>
                        <div class="col-sm-6">

                            {{-- Add brand from here --}}
<form action="{{url('about/update/'.$abouts->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Heading one</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="heading_one" value="{{$abouts->heading_one}}" aria-describedby="emailHelp">
    @error('heading_one')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Heading two</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="heading_two" value="{{$abouts->heading_two}}" aria-describedby="emailHelp">
    @error('heading_two')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
 <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Text one</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="text_one" value="{{$abouts->text_one}}" aria-describedby="emailHelp">
    @error('text_one')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">List One</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="list_one" value="{{$abouts->list_one}}" aria-describedby="emailHelp">
    @error('list_one')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">list two</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="list_two" value="{{$abouts->list_two}}" aria-describedby="emailHelp">
    @error('list_two')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">list three</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="list_three" value="{{$abouts->list_three}}" aria-describedby="emailHelp">
    @error('list_three')
<span class="text-danger">{{$message}}</span>        
    @enderror
  </div>
   <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">text two</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="text_two" value="{{$abouts->text_two}}" aria-describedby="emailHelp">
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