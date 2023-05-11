@extends('backend.master')
@section ('content')
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
