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


<form action="/article/{{$article->id}}" method="post">
    @csrf
    @method("PUT")
  <div class="form-group">
      <label for="exampleInputDate"> Date </label>
      <input type="text" class="form-control" id="exampleInputName" name="date" value="{{$article->date}}">
    </div>
    <div class="form-group">
      <label for="exampleInputTitle" class="form-label"> Title </label>
      <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name" value="{{$article->name}}">
    </div>
    <div class="form-group">
      <label for="exampleInputDesc" class="form-label"> Desc </label>
      <input type="text" class="form-control" id="exampleInputPassword1" name="desc" value="{{$article->desc}}">
    </div>
    <button type="submit" class="btn btn-primary"> Create article </button>
  </form>
@endsection