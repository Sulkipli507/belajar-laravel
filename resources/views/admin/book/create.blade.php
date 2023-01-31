{{-- <!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <div class="container mt-5">
    <form action="{{route('book-store')}}" method="post">
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Nama</label>
          <input name="name"class="form-control" >

          @error('name')
          <span class="text-danger">
            <strong>{{$message}}</strong>
          </span>
          @enderror

        </div>

        <div class="mb-3">
          <label for="year" class="form-label">Penulis</label>
          <input name="author" class="form-control">

          @error('author')
          <span class="text-danger">
            <strong>{{$message}}</strong>
          </span>
          @enderror

        </div>

        <div class="mb-3">
          <label for="year" class="form-label">Tahun</label>
          <input name="year"class="form-control">

          @error('year')
          <span class="text-danger">
            <strong>{{$message}}</strong>
          </span>
          @enderror

        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>

  </body>
</html> --}}

@extends('backend.master')

@section('content')
<form action="{{route('book-store')}}" method="post">
    @csrf
    <div class="mb-3">
      <label for="name" class="form-label">Nama Buku</label>
      <input name="name"class="form-control" >

      @error('name')
      <span class="text-danger">
        <strong>{{$message}}</strong>
      </span>
      @enderror

    </div>
    <div class="mb-3">
        <label for="category_id" class="form-label">Category</label>
        <select class="form-control" name="category_id" id="">
            <option label="Pilih Category"></option>
            @foreach ($category as $item)
            <option value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

      @error('category_id')
      <span class="text-danger">
        <strong>{{$message}}</strong>
      </span>
      @enderror

    </div>

    <div class="mb-3">
      <label for="author" class="form-label">Penulis</label>
      <input name="author" class="form-control">

      @error('author')
      <span class="text-danger">
        <strong>{{$message}}</strong>
      </span>
      @enderror

    </div>

    <div class="mb-3">
      <label for="year" class="form-label">Tahun</label>
      <input name="year"class="form-control">

      @error('year')
      <span class="text-danger">
        <strong>{{$message}}</strong>
      </span>
      @enderror

    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection
