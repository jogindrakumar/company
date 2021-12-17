@extends('admin.admin_master')
@section('admin_content')

    {{-- @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
  {{session('success')}}
</div>
@endif --}}
<div class="card card-default">
<div class="card-header card-header-border-bottom">
    <h2>Change Password</h2>
</div>

<div class="card-body">
    <form action="{{route('password.update')}}" method="POST" class="form-pill">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput3">Current Password</label>
            <input type="password" class="form-control" name="oldpassword" id="current_password" placeholder="current password">
            @error('oldpassword')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlPassword3">New Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
             @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
         <div class="form-group">
            <label for="exampleFormControlPassword3">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="confirm Password">
             @error('password_confirmation')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>
       <button type="submit" class="btn btn-primary btn-default">Save</button>
    </form>
										</div>
</div>
@endsection