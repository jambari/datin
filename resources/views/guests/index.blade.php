@extends('guests.layout')
@section('after_style')
@endsection
@section('content')
@include('guests.pesan')
<div class="container" style="margin-top: 3%;">
        <form action="/guests/search" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Cari Tamu"> <span class="input-group-btn">
                    <button type="submit" class="btn btn-success">
                        <span class="glyphicon glyphicon-search">Cari</span>
                    </button>
                </span>
            </div>
        </form>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="container" style="margin-top: 3%;">
                <h3 class="text-center" >Daftar tamu terkini</h3>
            </div>

                <div class="row" style="margin-top: 3%;">
                                    @if ($guests)
                    @foreach ($guests as $guest)
                    <a href="{{ route('guests.show',$guest->id) }}">
                    <div class="col-md-4" style="margin-bottom: 3%;">
                        
                    <div class="card" style="width: 18rem;">
                      <img class="card-img-top" src="{{ \Storage::url('photos/' . $guest->foto) }}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title text-dark">{{ $guest->nama }} </h5>
                        <h5 class="card-text text-dark">{{ $guest->dari }} </h5>
                        <p class="card-text text-dark">{{ $guest->keperluan }}</p>
                        <p class="card-text text-info">{{ \Carbon\Carbon::parse($guest->created_at)->format('d-M-Y')}}</p>
                        <form action="{{ route('guests.destroy',$guest->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('guests.edit',$guest->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </div>
                    </a>
                    </div>
                @endforeach
                    {!! $guests->links() !!}
                @endif
                </div>
        </div>
    </div>
</div>
    <!-- end of container -->
@endsection

@section('script')
@endsection

