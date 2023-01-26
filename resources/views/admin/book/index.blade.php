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
    <div class="container mt-5">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <a href="{{route('book-create')}}"><button class="btn btn-success">Create data</button></a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Nama</th>
            <th scope="col">Penulis</th>
            <th scope="col">Tahun terbit</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
            @foreach ($books as $key => $item)
          <tr>
            <th scope="row">{{$key + 1}}</th>
            <td>{{$item->name}}</td>
            <td>{{$item->author}}</td>
            <td>{{$item->year}}</td>
            <td>
                <a class="btn btn-primary" href="{{route("book-edit", $item->id)}}">Edit</a>
                <form action="{{route("book-delete", $item->id)}}" method="post" style="display:inline" class="form-check-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" >HAPUS</button>
                </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </body>
</html> --}}

@extends('backend.master')

@section('content')
<div class="card card-body">
    @if (Auth::user()->role == "admin")
    <a href="{{route('book-create')}}"><button class="btn btn-primary">Create data</button></a>
    @endif
    <table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Nama Buku</th>
        <th scope="col">Penulis</th>
        <th scope="col">Tahun terbit</th>
        @if (Auth::user()->role == "admin")
        <th scope="col">Action</th>
        @endif
      </tr>
    </thead>
    <tbody>
        @foreach ($books as $key => $item)
      <tr>
        <th scope="row">{{$key + 1}}</th>
        <td>{{$item->name}}</td>
        <td>{{$item->author}}</td>
        <td>{{$item->year}}</td>
        @if (Auth::user()->role == "admin")
        <td>
            <a class="btn btn-primary" href="{{route("book-edit", $item->id)}}">Edit</a>
            <form action="{{route("book-delete", $item->id)}}" method="post" style="display:inline" class="form-check-inline">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit" >HAPUS</button>
            </form>
        </td>
        @endif
      </tr>
      @endforeach
    </tbody>
  </table>
</div>

<div class="mt-2 float-right">
    {{$books->links()}}
</div>

@if (session('status'))
    <script>
        Swal.fire({
            icon:'success',
            title:'Sukses!',
            text:"{{session('status')}}",
        });
    </script>
@endif
@endsection
