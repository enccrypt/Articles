@extends('layout')
@section('content')
    <div class="card" style="width: 38rem;">
    <div class="card-body">
        <h5 class="card-title"> {{$article->name}} </h5>
        <p class="card-text"> {{$article->desc}}</p>
        <div class="btn-toolbar">
             <a href="/article/{{$article->id}}/edit" class="btn btn-primary mr-3"> Edit article </a>
             <form action="/article/{{$article->id}}" method="post"> 
            @method("DELETE")
            <button type="submit" class="btn btn-danger"> Delete article </button>
            @csrf
        </form>
        </div>

    </div>
    </div>
    <div class="card mt-2 mb-2">
    <div class="card-header text-center">
        <h4> Comments </h4>
        <form action="/comment" method="post">
            @csrf
            <input type="hidden" name="article_id" value="{{$article->id}}">
            <div class="form-group">
                <label for="exampleInputDate"> Title </label>
                <input type="text" class="form-control" id="exampleInputName" name="title">
            </div>
            <div class="form-group">
                <label for="exampleInputTitle" class="form-label"> Description </label>
                <input type="text" class="form-control" id="exampleInputName" name="text">
            </div>
            <button type="submit" class="btn btn-primary"> Create comment </button>
        </form>
        @foreach($comments as $comment)
        <div class="card" style="width: 38rem;">
        <div class="card-body">
            <h5 class="card-title"> {{$article->title}} </h5>
            <p class="card-text"> {{$article->desc}}</p>
            <div class="btn-toolbar">
                <a href="/article/{{$article->id}}/edit" class="btn btn-primary mr-3"> Edit article </a>
                <form action="/article/{{$article->id}}" method="post"> 
                @method("DELETE")
                <button type="submit" class="btn btn-danger"> Delete article </button>
                @csrf
            </form>
            </div>
        </div>
        </div>
        @endforeach
        </div>
</div>
   
@endsection