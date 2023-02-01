@extends('backend.master')
@section('content')
    <div class="card card-body">
        <p>Nama :{{$book->name}}</p>
        <p>Kategori: {{$book->category->name}}</p>
        <p>Penulis: {{$book->author}}</p>
        <p>Tahun terbit: {{$book->year}}</p>
    </div>
@endsection
