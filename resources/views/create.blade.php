@extends('layout')
@section('title')
    Thêm Phim
@endsection
@section('content')
<div class="container m-4">
    <h1>Create Movie</h1>
    <a href="{{ route('home') }}" class="btn btn-primary">List</a>

    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Title</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label class="form-label">Poster</label>
            <input class="form-control" type="file" name="poster">
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Intro</label>
            <textarea class="form-control" name="intro" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label for="" class="form-label">Release_date</label>
            <input class="form-control" name="release_date"  type="date">
        </div>
        
        <div class="mb-3">
            <label for="" class="form-label">Gene</label>
            <select name="gene_id" class="form-select" >
                @foreach ($gene as $gene)
                    <option value="{{ $gene->id }}">
                        {{ $gene->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </form>
</div>
@endsection
