@extends('guests.layout')

@section('content')
<img class="card-img-top" src="{{ \Storage::url('photos/' . $guest->foto) }}" alt="Card image cap">
<p> nama: {{ $guest->nama }} </p>
<p>Dari :{{ $guest->dari }} </p>
@endsection