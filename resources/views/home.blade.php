@extends('layout')
@section('title')
    Trang chủ
@endsection
@section('content')

<h1>List</h1>
<div class="col-md-6">
<form class="d-flex mh-75 wh-75" method="get" action="{{route('search')}}">
  <input class="form-control me-2" type="text" placeholder="Search" name="search" value="{{isset($search) ?$search : ''}}">
  <button class="btn btn-primary" type="submit">Search</button>
</form></div>
@if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
  <table class="table table-dark table-striped p-2">
      <thead>
          <tr>
            <th scope="row">STT</th>
            <th scope="col">Title</th>
            <th scope="col">Poster</th>
            <th scope="col">intro</th>
            <th scope="col">release_date</th>
            <th scope="col">Gene</th>
            <th scope="col"><a href="{{route('create')}}" class="btn btn-success">Create</a</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($movie as $index =>$sp)
          <tr>
              <th scope="row">{{$index+1}}</th>
              <td>{{$sp->title}}</td>
              <td><img src="{{asset('./storage/'.$sp->poster)}}" alt="" height="50px" width="50px"></td>
              <td>{{$sp->intro}}</td>
              <td>{{$sp->release_date}}</td>
              <td>{{$sp->gene->name}}</td>
              <td>
                <a href="{{route('detail',$sp)}}" class="btn btn-primary">Detail</a>
                <a href="{{ route('edit', $sp) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('destroy', $sp) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc muốn xóa không')" type="submit" class="btn btn-danger">Delete</button>
                  </td>
            </tr>
          </form>
          @endforeach
         
         
        </tbody>
    </table>
    {{-- {{$movie->links()}}  --}}
@endsection