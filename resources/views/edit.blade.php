@extends('layout')
@section('title')
    Sửa Movie
@endsection
@section('content')
<div class="container m-4">
    @if (session('message'))
    <div class="alert alert-success">
        {{session('message')}}
    </div>
@endif
    <h1>Edit movie</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">List</a>

    <form action="{{ route('update',$movie) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$movie->title}}">
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="poster" id="fileImage" >
            <img src="{{asset('./storage/'.$movie->poster)}}" alt="" width="50px" height="50px" id="img" >
        </div>
        <div class="mb-3">
            <label for="" class="form-label">intro</label>
            <textarea class="form-control" name="intro" rows="3"  >{{$movie->intro}}</textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">release_date</label>
           <input type="date" class="form-control" name="release_date" value="{{$movie->release_date}}">
        </div>
      
        <div class="mb-3">
            <label for="" class="form-label">Gene</label>
            <select name="gene_id" class="form-select" id="" >
                @foreach ($gene as $gene)
                    <option    value="{{ $gene->id }}"
                        @if ($gene->id==$movie->gene_id)
                           selected
                        @endif>
                        {{ $gene->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">UPDATE</button>
        </div>
    </form>
</div>
<script>
    var fileImage = document.querySelector('#fileImage');
    var img = document.querySelector('#img');

    // thay đổi ảnh
    fileImage.addEventListener('change', function (e) {
        e.preventDefault();
        img.src = URL.createObjectURL(this.files[0]);
    })
</script>
@endsection
