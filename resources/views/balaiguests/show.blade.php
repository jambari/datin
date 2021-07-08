@extends('guests.layout')

@section('content')

<p> nama: {{ $guest->nama }} </p>
<p>Dari :{{ $guest->dari }} </p>
@endsection