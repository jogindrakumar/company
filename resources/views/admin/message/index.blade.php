
@extends('admin.admin_master')
@section('admin_content')

    {{-- @if(session('success'))
        <div class="alert alert-success text-center" role="alert">
  {{session('success')}}
</div>
@endif --}}
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Subject</th>
      <th scope="col">Message</th>
    </tr>
  </thead>
  <tbody>
    @php($i=1)
    @foreach ($messages as $message )
      
  
    <tr>
      <th scope="row">{{$i++}}</th>
      <td>{{$message->name}}</td>
      <td>{{$message->email}}</td>
      <td>{{$message->subject}}</td>
      <td>{{$message->message}}</td>
      <td><a href="{{url('message/delete/'.$message->id)}}" class="btn btn-danger">Delete</a></td>
      
    </tr>
     @endforeach
  </tbody>
</table>


 @endsection