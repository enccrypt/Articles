@extends('layout')
@section('content')
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
        @foreach($errors->all() as $error)
        <li>
            {{$error}}
        </li>
        @endforeach
        </ul>
    </div>
    @endif
<form action="register" method="post">
    @csrf
 <div class="form-group">
     <label for="exampleInputPassword1"> Name </label>
     <input type="text" class="form-control" id="exampleInputName" name="name">
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection