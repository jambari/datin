@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
@include('guests.pesan')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container" >
                <h3 class="text-center" >Daftar tamu terkini</h3>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Dari</th>
                    <th scope="col">Keperluan</th>
                    <th scope="col">Keterangan</th>
                    <th scope="col">Foto</th>
                    <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                @if ($guests)
                    @foreach ($guests as $guest)
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td> {{ $guest->created_at }}</td>
                        <td> {{ $guest->nama }} </td>
                        <td> {{ $guest->dari }} </td>
                        <td> {{ $guest->keperluan }} </td>
                        <td>{{ $guest->keterangan }}</td>
                        <td> <img src="{{ \Storage::url('photos/' . $guest->foto) }}" alt="" width="120" height="70"> </td>
                        <td>
                        <form action="{{ route('guests.destroy',$guest->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('guests.show',$guest->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('guests.edit',$guest->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>


                        </td>
                    </tr>
                    @endforeach
                    {!! $guests->links() !!}
                @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
    <!-- end of container -->
@endsection

@section('script')
@endsection

