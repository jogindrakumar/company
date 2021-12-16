@extends('admin.admin_master')
@section('admin_content')

    @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
  {{session('success')}}
</div>
@endif
<div class="card card-default">
<div class="card-header card-header-border-bottom">
    <h2>Change Password</h2>
</div>

<div class="card-body">
    <form action="{{route('user.profile.update')}}" method="POST" class="form-pill">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput3">User Name</label>
            <input type="text" class="form-control" name="name"  value="{{$user['name']}}">
           
        </div>
        <div class="form-group">
            <label for="exampleFormControlPassword3">E-Mail</label>
            <input type="email" class="form-control" name="email" value="{{$user['email']}}">
           
        </div>
        
       <button type="submit" class="btn btn-primary btn-default">Update</button>
    </form>
										</div>
</div>
@endsection