@extends('backend.master')
@section ('content')
<h1>ini adalah dashboard</h1>
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
