@extends('layout')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col"> Title </th>
      <th scope="col"> Text </th>
      <th scope="col"> Article </th>
      <th scope="col"> User </th>
      <th scope="col"> Accept/Reject </th>
    </tr>
  </thead>
  <tbody>
    @foreach($comment as $comment)
    <tr>
      <th scope="row"> {{$article->title}}</th>
      <th scope="row"> {{$article->text}}</th>
      <td> <a href="/article/{{$article->id}}"> {{$article->name}} </a> </td>
      <td> {{$article->desc}} </td>
    </tr>
    @endforeach
  </tbody>
</table>
{{$articles->links()}}
@endsection